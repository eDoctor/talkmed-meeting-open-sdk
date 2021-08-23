<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace eDoctor\Meeting\Models\Live;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议创建
 * Class LiveDeleteRequest
 * @package eDoctor\Meeting\Models\Live】
 */
class LiveDeleteRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_DELETE;

    const REQUEST_URI = 'open/room/%d';

    /**
     * LiveDeleteRequest constructor.
     * @param int $roomId
     * @throws RequestException
     */
    public function __construct(int $roomId)
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
