<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace eDoctor\Meeting\Models\Live;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 添加会议讲者模块
 * Class LiveAddSpeakerRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveAddSpeakerRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room/%d/speaker';

    /**
     * LiveAddSpeakerRequest constructor.
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
    public function getRequestUri() :string
    {
        return $this->request_uri;
    }


    private $speakers;

    /**
     * @param array $speaker
     */
    public function setSpeakers(array $speaker)
    {
        $this->speakers = $speaker;
    }


    /**
     * @param $options
     */
    public function setOptions(array $options) {

        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }
}
