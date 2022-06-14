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
class PopUpAddRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/room/%d/popup';


    public function __construct($roomId)
    {
        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id参数 ');
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

    private $content;

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    private $close_enable;

    public function setCloseEnable(string $close_enable)
    {
        $this->close_enable = $close_enable;
    }

    private $close_duration;

    public function setCloseDuration(string $close_duration)
    {
        $this->close_duration = $close_duration;
    }

    private $popup_now;

    public function setPopupNow(string $popup_now)
    {
        $this->popup_now = $popup_now;
    }

    private $popup_at;

    public function setPopupAt(string $popup_at)
    {
        $this->popup_at = $popup_at;
    }

    private $title;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

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
