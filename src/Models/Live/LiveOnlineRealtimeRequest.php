<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace App\Helpers;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 修改会议状态
 * Class LiveStatusRequest
 * @package eDoctor\Meeting\Models\Live
 */
class LiveOnlineRealtimeRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/online_duration';


    public function __construct(int $roomId)
    {
        if (empty($roomId)) throw new RequestException('缺少room_id参数 初始化uri');
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


    private $type;


    public function setType(string $type)
    {
        $this->type = $type;
    }


    /**
     * @param $options
     */
    public function setOptions(array $options)
    {

        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
