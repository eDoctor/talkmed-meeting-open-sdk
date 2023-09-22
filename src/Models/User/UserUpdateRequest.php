<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2022/03/01
 * Time: 上午 10:50
 */

namespace eDoctor\Meeting\Models\User;


use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 用户更新接口
 * Class UserCreateRequest
 * @package eDoctor\Meeting\Models\User
 */
class UserUpdateRequest extends TlkRequest {

    /**
     * 请求方法
     */
    const REQUEST_METHOD  = TypeData::METHOD_PUT;

    /**
     * 路由
     */
    const REQUEST_URI = 'open/user/%d';

    /**
     * 初始化请求地址
     * UserCreateRequest constructor.
     * @throws RequestException
     */
    public function __construct($userId) {
        if (empty($userId)) throw new RequestException('初始化uri: 缺少room_id参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $userId);
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
    private $nickname;

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname) {
        $this->nickname = $nickname;
    }


    private $avatar;

    /**
     * 头像
     * @param string $avatar
     */
    public function setAvatar(string $avatar) {
        $this->avatar = $avatar;
    }

    private $user_role;

    /**
     * 设置用户角色
     * @param string $userRole
     */
    public function setUserRole(string $userRole) {
        $this->user_role = $userRole;
    }


    private $realname;

    /**
     * 设置真实姓名
     * @param string $realName
     */
    public function setRealName(string $realName) {
        $this->realname = $realName;
    }

    /**
     * 设置数组参数
     * @param array $options
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
