<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 上午11:30
 */

namespace eDoctor\Meeting\Models\LiveFile;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 文件打印列表
 * Class FilePrintListRequest
 * @package eDoctor\Meeting\Models\Live
 */
class FilePrintListRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/file/%d/print';

    /**
     * FilePrintListRequest constructor.
     * @param $fileId
     * @throws RequestException
     */
    public function __construct($fileId)
    {
        if (empty($fileId)) throw new RequestException('缺少file_id参数 初始化uri');
        $this->request_uri = sprintf(self::REQUEST_URI, $fileId);
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
     * @param array $options
     */
    public function setOptions(array $options) {

        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }
}
