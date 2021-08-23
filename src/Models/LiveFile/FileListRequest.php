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
 * 文件列表
 * Class LiveDetailRequest
 * @package eDoctor\Meeting\Models\Live
 */
class FileListRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/file';

    /**
     * FileListRequest constructor.
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


    private $page;

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }


    private $page_size;

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->page_size = $pageSize;
    }


    private $type;

    /**
     * @param mixed $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
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
