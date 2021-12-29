<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/12/29
 * Time: 下午9:20
 */

namespace eDoctor\Meeting\Models\Form;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 用户表单填写接口
 * Class UserCreateRequest
 * @package eDoctor\Meeting\Models\User
 */
class UserFormRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/form_user';


    /**
     * 初始化请求地址
     * UserCreateRequest constructor.
     */
    public function __construct()
    {
        $this->request_uri = self::REQUEST_URI;
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    /**
     * @var
     */
    private $room_id;


    /**
     * @param int $room_id
     */
    public function setRoomId(int $room_id) {
        $this->room_id = $room_id;
    }


    private $user_id;

    /**
     * @param int $userId
     */
    public function setUserId(int $userId) {
        $this->user_id = $userId;
    }

    private $form_id;

    /**
     * @param int $formId
     */
    public function setFormId(int $formId) {
        $this->form_id = $formId;
    }

    /**
     * @var
     */
    private $answers;

    /**
     * 设置答案
     * @param array $answers
     */
    public function setAnswer(array $answers) {
        $this->answers = $answers;
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
