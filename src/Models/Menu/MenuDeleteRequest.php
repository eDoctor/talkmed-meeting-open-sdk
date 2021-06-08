<?php

namespace eDoctor\Meeting\Models\Menu;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 菜单删除
 * Class MenuDeleteRequest
 * @package eDoctor\Meeting\Models\Menu
 */
class MenuDeleteRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_DELETE;

    const REQUEST_URI = 'open/room/%d/menu/%s';

    /**
     * MenuDeleteRequest constructor.
     * @param $roomId
     * @param $menuSign
     * @throws RequestException
     */
    public function __construct($roomId, $menuSign)
    {
        if (empty($roomId) || empty($menuSign)) throw new RequestException('初始化uri: 缺少room_id参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId,$menuSign);
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

