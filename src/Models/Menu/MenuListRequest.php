<?php

namespace eDoctor\Meeting\Models\Menu;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 菜单列表
 * Class MenuListRequest
 * @package eDoctor\Meeting\Models\Menu
 */
class MenuListRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/menu';

    /**
     * MenuListRequest constructor.
     * @param $roomId
     * @throws RequestException
     */
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

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options) {

        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}

