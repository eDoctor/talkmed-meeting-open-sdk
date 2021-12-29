<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/11/17
 * Time: 下午3:30
 */
namespace eDoctor\Meeting\Models\Data;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 导出会议表单数据
 * Class FormBindRequest
 * @package App\Libs\MeetingSdk
 */
class FormReportRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/room/%d/form_report';

    /**
     * FormReportRequest constructor.
     * @param int $roomId
     * @throws RequestException
     */
    public function __construct(int $roomId) {

        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id参数 ');
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

    /**
     * @param string $type
     */
    public function setType(string $type) {
        $this->type = $type;
    }


    /**
     * @param array $options
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
