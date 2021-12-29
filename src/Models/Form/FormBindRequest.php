<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/11/17
 * Time: 下午3:30
 */
namespace eDoctor\Meeting\Models\Form;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议表单绑定
 * Class FormBindRequest
 * @package App\Libs\MeetingSdk
 */
class FormBindRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/form_module';

    /**
     * 初始化请求地址
     * UserCreateRequest constructor.
     */
    public function __construct() {
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

    private $room_id;

    /**
     * @param int $room_id
     */
    public function setRoomId(int $room_id) {
        $this->room_id = $room_id;
    }

    private $form_id;

    /**
     * @param int $form_id
     */
    public function setFormId(int $form_id) {
        $this->form_id = $form_id;
    }

    private $collection_rule;

    /**
     * @param int $collection_rule
     */
    public function setCollectionRule(int $collection_rule) {
        $this->collection_rule = $collection_rule;
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
