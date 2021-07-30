<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/5/30
 * Time: 上午11:23
 */
namespace eDoctor\Meeting;

use eDoctor\Meeting\Common\TypeData;
use GuzzleHttp\Client;
use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\Exception\RequestException;
use GuzzleHttp\Psr7\Request;


/**
 * meeting Client
 * Class MeetingClient
 * @package Meeting
 */
class MeetingClient {

    private $appId;

    private $appSecret;

    private $timeout = '3.0';

    /**
     * 接口版本
     * @var string
     */
    private $version = null;


    /**
     * @var string
     */
    private $baseUri = '';

    /**
     * MeetingClient constructor.
     * @param string $appId
     * @param string $appSecret
     * @throws RequestException
     */
    public function __construct(string $appId, string $appSecret) {

        if (empty($appId) || empty($appSecret)) {
            throw new RequestException('appId or appSecret is not empty');
        }
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }


    public function setApiBaseUri(string $baseUri = '') :MeetingClient {

        $this->baseUri = $baseUri;
        return $this;
    }


    /**
     * @param string $version
     * @return $this
     */
    public function setApiVersion(string $version = TypeData::API_VERSION) :MeetingClient {

         $this->version = $version;
         return $this;
    }


    /**
     * @return array
     */
    private function getHeader() :array
    {
        $time = time();
        return  [
            'timestamp'   => $time,
            'appid'       => $this->appId,
            'signature'   => Tool::getOpenApiSignature($this->appId, $this->appSecret, $time)
        ];
    }

    /**
     * 获取请求uri
     * @param string $uri
     * @return string
     */
    private function getRequestUri(string $uri) :string {
        return sprintf('/%s/%s', $this->version, $uri);
    }

    /**
     * @param TlkRequest $methodRequest
     * @return array
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function request(TlkRequest $methodRequest) {

        if (empty($this->baseUri) || !Tool::isHttps($this->baseUri)) {
             throw new RequestException('请设置base_uri');
        }

        if (is_null($this->version)) {
            $this->version = $methodRequest::DEFAULT_API_VERSION ? $methodRequest::DEFAULT_API_VERSION :TypeData::API_VERSION ;
        }

        $uri = $this->getRequestUri($methodRequest->getRequestUri());

        if (empty($uri)) {
            throw new RequestException('请设置uri');
        }

        $method = $methodRequest::REQUEST_METHOD;
        $params = $this->getVars($methodRequest);

        return $this->baseRequest($uri, $method, $params);
    }


    /**
     * @param string $uri
     * @param string $method
     * @param array $params
     * @return array
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function baseRequest(string $uri, string $method ,array $params) :array {

        // Create a client with a base URI
        $client = new Client(['base_uri' => $this->baseUri, 'headers' => $this->getHeader()]);

        switch ($method) {
            case TypeData::METHOD_GET:
                if ($params) $uri .= '?'.http_build_query($params);
                $body =  $client->request($method, $uri)->getBody();
                break;
            case TypeData::METHOD_UPLOAD:
                $body =  $client->request(TypeData::METHOD_POST, $uri, $params)->getBody();
                break;
            case TypeData::METHOD_PUT:
            case TypeData::METHOD_POST:
            default:
                $body =  $client->request($method, $uri, ['form_params' => $params])->getBody();
                break;
        }
        $res =  json_decode($body, true);
        if (!is_array($res)){
            throw new RequestException('error 数据解析出错');
        }
        return $res;

    }




    /**
     * 获取类定义变量
     * @param TlkRequest $request
     * @return array
     * @throws \ReflectionException
     */
    private function getVars(TlkRequest $request) :array {

        $ref =  new \ReflectionClass($request);
        $vars = array_column($ref->getProperties(),'name');
        $params = [];
        $total = count($vars);

        for ($i = 0; $i < $total;$i++) {
            $field = $vars[$i];
            $a = $ref->getProperty($field);
            $a->setAccessible(true);
            $val = $a->getValue($request);
            if (is_null($val) || in_array($field, TypeData::FILTER_VARS)) {
                 continue;
            }
            $params[$field] = $val;
        }
        return $params;
    }




}
