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
 * 会议用户出入记录
 * Class LiveBaseRequest
 * @package eDoctor\Meeting\Models\Data
 */
class RoomLogsRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/room_logs';

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



    private $is_vod;

    /**
     * @param mixed $is_vod
     */
    public function setIsVod(int $is_vod): void
    {
        $this->is_vod = $is_vod;
    }


    private $start_at;

    /**
     * @param mixed $start_at
     */
    public function setStartAt($start_at): void
    {
        $this->start_at = $start_at;
    }


    private $end_at;


    /**
     * @param mixed $end_at
     */
    public function setEndAt($end_at): void
    {
        $this->end_at = $end_at;
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
