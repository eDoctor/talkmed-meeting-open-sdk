<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午3:54
 */
namespace eDoctor\Meeting\Models\LiveFile;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 文件绑定
 * Class FileUploadRequest
 * @package eDoctor\Meeting\Models\LiveFile
 */
class FileBindRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room/%d/file';

    /**
     * FileBindRequest constructor.
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
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $file_ids;


    /**
     * @param mixed $file_ids
     */
    public function setFileIds(array $file_ids)
    {
        $this->file_ids = $file_ids;
    }

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
