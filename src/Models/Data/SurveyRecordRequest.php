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
 * 会议调研统计
 * Class SurveyRecordRequest
 * @package eDoctor\Meeting\Models\Data
 */
class SurveyRecordRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/survey_records';

    /**
     * SurveyRecordRequest constructor.
     * @param $roomId
     * @throws RequestException
     */
    public function __construct($roomId)
    {
        if (empty($roomId)) throw new RequestException('缺少room_id参数 初始化uri');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId);
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
