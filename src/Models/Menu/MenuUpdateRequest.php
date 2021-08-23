<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午3:33
 */

namespace eDoctor\Meeting\Models\Menu;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 菜单更新
 * Class MenuUpdateRequest
 * @package eDoctor\Meeting\Models\Menu
 */
class MenuUpdateRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_PUT;


    const REQUEST_URI = 'open/room/%d/menu/%s';

    /**
     * MenuUpdateRequest constructor.
     * @param $roomId
     * @param $menuSign
     * @throws RequestException
     */
    public function __construct($roomId, $menuSign)
    {
        if (empty($roomId) || empty($menuSign)) throw new RequestException('初始化uri: 缺少room_id/menuId参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId, $menuSign);
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }


    private $menu_title;


    /**
     * @param mixed $menu_title
     */
    public function setMenuTitle(string $menu_title)
    {
        $this->menu_title = $menu_title;
    }


    private $menu_type;

    /**
     * @param mixed $menu_type
     */
    public function setMenuType(int $menu_type)
    {
        $this->menu_type = $menu_type;
    }


    private $menu_title_en;

    /**
     * @param mixed $menu_title_en
     */
    public function setMenuTitleEn(string $menu_title_en)
    {
        $this->menu_title_en = $menu_title_en;
    }


    private  $menu_content;

    /**
     * @param mixed $menu_content
     */
    public function setMenuContent(string $menu_content)
    {
        $this->menu_content = $menu_content;
    }

    private  $menu_href;

    /**
     * @param mixed $menu_href
     */
    public function setMenuHref(string $menu_href)
    {
        $this->menu_href = $menu_href;
    }

    private  $menu_show;

    /**
     * @param mixed $menu_show
     */
    public function setMenuShow(int $menu_show)
    {
        $this->menu_show = $menu_show;
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
