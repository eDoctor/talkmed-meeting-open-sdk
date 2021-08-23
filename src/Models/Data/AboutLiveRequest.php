<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午4:55
 */
namespace eDoctor\Meeting\Models\Data;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;
use eDoctor\Meeting\Exception\RequestException;


/**
 * 会议调研报表
 * Class AboutLiveRequest
 * @package eDoctor\Meeting\Models\Data
 */
class AboutLiveRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/survey/%d/about_live';

    /**
     * AboutLiveRequest constructor.
     * @param $surveyId
     * @throws RequestException
     */
    public function __construct($surveyId)
    {
        if (empty($surveyId)) throw new RequestException('初始化uri: 缺少survey_id参数');
        $this->request_uri = sprintf(self::REQUEST_URI, $surveyId);
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri() :string
    {
        return $this->request_uri;
    }


    public function setOptions(array $options)
    {
        // TODO: Implement setOptions() method.
        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }
}
