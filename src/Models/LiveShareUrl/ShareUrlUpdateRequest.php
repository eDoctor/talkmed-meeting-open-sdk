<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午3:33
 */

namespace eDoctor\Meeting\Models\LiveShareUrl;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 菜单更新
 * Class MenuUpdateRequest
 * @package eDoctor\Meeting\Models\Menu
 */
class ShareUrlUpdateRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_PUT;


    const REQUEST_URI = 'open/room/%d/custom_share_url/%d';

    /**
     * MenuUpdateRequest constructor.
     * @param $roomId
     * @param $menuSign
     * @throws RequestException
     */
    public function __construct($roomId, $id)
    {
        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id/menuId参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId, $id);
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

    public $type;

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public $url;

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public $password;

    public function setPassword(string $password)
    {
        $this->password = $password;
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
