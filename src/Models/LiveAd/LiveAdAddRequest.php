<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午3:33
 */

namespace App\Helper;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 增加广告位
 * Class MenuUpdateRequest
 * @package eDoctor\Meeting\Models\Menu
 */
class LiveAdAddRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/room/%d/ad';

    /**
     * MenuUpdateRequest constructor.
     * @param $roomId
     * @param $menuSign
     * @throws RequestException
     */
    public function __construct($roomId)
    {
        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id/menuId参数 ');
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

    public $title;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public $intro;

    public function setIntro(string $intro)
    {
        $this->intro = $intro;
    }

    public $image;

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public $url;

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public $click_type;

    public function setClickType(string $click_type)
    {
        $this->click_type = $click_type;
    }

    public $content;

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public $is_show;

    public function setIsShow(int $is_show)
    {
        $this->is_show = $is_show;
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
