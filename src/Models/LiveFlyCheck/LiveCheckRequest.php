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
 * 会议飞检接口
 * Class LiveDetailRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveCheckRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/check';

    /**
     * LiveCheckRequest constructor.
     */
    public function __construct()
    {
        $this->request_uri = self::REQUEST_URI;
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
