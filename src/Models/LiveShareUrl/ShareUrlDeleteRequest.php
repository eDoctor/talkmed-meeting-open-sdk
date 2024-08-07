<?php

namespace eDoctor\Meeting\Models\LiveShareUrl;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 删除自定义分享链接
 */
class ShareUrlDeleteRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_DELETE;


    const REQUEST_URI = 'open/room/%d/custom_share_url/%d';


    public function __construct($roomId, $id)
    {
        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id/menuId参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId, $id);
    }

    private $request_uri;

    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    public function setOptions(array $options)
    {

        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }
}
