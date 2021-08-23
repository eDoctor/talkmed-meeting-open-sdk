<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午3:54
 */
namespace eDoctor\Meeting\Models\LiveFile;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 文件上传
 * Class FileUploadRequest
 * @package eDoctor\Meeting\Models\LiveFile
 */
class FileUploadRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_UPLOAD;

    const REQUEST_URI = 'open/file';

    /**
     * FileUploadRequest constructor.
     */
    public function __construct()
    {
        $this->request_uri =  self::REQUEST_URI;
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $multipart;

    /**
     * 设置文件名称
     * @param $absPath
     * @param $fileName
     */
    public function setFile(string $absPath, string $fileName)
    {
        $this->multipart[] = [
                'name' => 'file',
                'contents' => fopen($absPath, 'r'),
                'filename' => $fileName
        ];
    }


    /**
     * @param mixed $room_id
     */
    public function setRoomId(int $room_id)
    {
        $this->multipart[] = [
                'name' => 'room_id',
                'contents' => $room_id,
        ];
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId(int $user_id)
    {
        $this->multipart[] =
            [
                'name' => 'user_id',
                'contents' => $user_id,
            ];
    }

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options) {
        throw  new \RangeException('该上传请求不适用此方法');
    }

}
