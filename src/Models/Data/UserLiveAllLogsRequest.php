<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午4:55
 */
namespace eDoctor\Meeting\Models\Data;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 用户直播观看总时长统计
 * Class UserLiveRequest
 * @package eDoctor\Meeting\Models\Data
 */
class UserLiveAllLogsRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/user_live_all_logs';

    /**
     * UserLiveAllLogsRequest constructor.
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

    private $type;

    /**
     * @param mixed $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
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
