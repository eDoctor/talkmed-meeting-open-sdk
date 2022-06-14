<?php

namespace App\Helper;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 菜单栏展示
 * Class MenuAddRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class PopUpDeleteRequest extends TlkRequest
{
    const REQUEST_METHOD = TypeData::METHOD_DELETE;


    const REQUEST_URI = 'open/room/%d/popup/%d';


    public function __construct($roomId, $popUpId)
    {
        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId, $popUpId);
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $content;
    private $close_enable;
    private $close_duration;
    private $popup_now;
    private $popup_at;

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options)
    {

        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
