<?php
namespace eDoctor\Meeting\Models\LiveShareUrl;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 增加自定义分享链接
 */
class ShareUrlAddRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/room/%d/custom_share_url';

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
