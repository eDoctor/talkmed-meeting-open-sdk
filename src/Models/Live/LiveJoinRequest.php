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
 * 会议加入
 * Class LiveJoinRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveJoinRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room/%d/access';

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

    private $user_id;

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }


    private $room_role;


    /**
     * @param int $room_role
     */
    public function setRoomRole(int $room_role)
    {
        $this->room_role = $room_role;
    }


    private $room_password;

    /**
     * @param mixed $room_password
     */
    public function setRoomPassword(string $room_password)
    {
        $this->room_password = $room_password;
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
