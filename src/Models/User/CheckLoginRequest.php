<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/12/29
 * Time: 下午9:20
 */

namespace eDoctor\Meeting\Models\User;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 验证登录接口
 * Class CheckLoginRequest
 * @package eDoctor\Meeting\Models\User
 */
class CheckLoginRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/check_login';

    /**
     * 初始化请求地址
     * UserCreateRequest constructor.
     */
    public function __construct() {
        $this->request_uri =  self::REQUEST_URI;
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $access_token;

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken) {
        $this->access_token = $accessToken;
    }

    private $platform;

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform = TypeData::DEFAULT_PLATFORM) {
        $this->platform = $platform;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
