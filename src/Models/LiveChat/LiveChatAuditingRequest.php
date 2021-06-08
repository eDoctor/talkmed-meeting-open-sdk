<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace eDoctor\Meeting\Models\LiveChat;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议讨论审核
 * Class LiveDetailRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveChatAuditingRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_PUT;

    const REQUEST_URI = 'open/room/%d/chats/%d';

    public function __construct($roomId, $chatId)
    {
        if (empty($roomId)) throw new RequestException('初始化request uri 缺少room_id参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId, $chatId);
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri() :string
    {
        return $this->request_uri;
    }


    private $audit_status;

    /**
     * @param mixed $audit_status
     */
    public function setAuditStatus($audit_status): void
    {
        $this->audit_status = $audit_status;
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
