<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午4:08
 */

namespace eDoctor\Meeting\Models\Live;

use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议更新
 * Class LiveUpdateRequest
 * @package Meeting\Models\Live
 */
class LiveBindSurveyRequest extends TlkRequest
{


    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room/%d/bind_survey';

//    const DEFAULT_API_VERSION = TypeData::API_VERSION_V2;


    /**
     * LiveUpdateRequest constructor.
     * @param int $roomId
     * @throws RequestException
     */
    public function __construct(int $roomId)
    {

        if (empty($roomId)) throw new RequestException('缺少room_id参数 初始化uri');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId);
    }


    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $survey_id;

    /**
     * @param string $val
     */
    public function setSurveyId(array $survey_id)
    {
        $this->survey_id = $survey_id;
    }

    /**
     * 统一赋值
     * @param $options
     */
    public function setOptions(array $options)
    {
        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
