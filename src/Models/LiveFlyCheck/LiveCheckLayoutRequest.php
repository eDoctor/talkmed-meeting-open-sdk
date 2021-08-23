<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace eDoctor\Meeting\Models\LiveFlyCheck;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 获取房间布局信息
 * Class LiveCheckLayoutRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveCheckLayoutRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/layout';

    /**
     * LiveCheckLayoutRequest constructor.
     * @param $roomId
     * @throws RequestException
     */
    public function __construct($roomId)
    {
        if (empty($roomId)) throw new RequestException('缺少room_id参数 初始化uri');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId);
    }
    
    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri() :string
    {
        return $this->request_uri;
    }


    /**
     * @param $options
     */
    public function setOptions(array $options) {

        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }
}
