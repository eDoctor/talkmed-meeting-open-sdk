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
class MenuShowRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/room/%d/menu_show';


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

    private $menu_sign;

    /**
     * @param mixed $menu_show
     */
    public function setMenuShow(int $menu_sign)
    {
        $this->menu_sign = $menu_sign;
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
