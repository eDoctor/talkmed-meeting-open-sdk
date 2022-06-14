<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午9:20
 */

namespace eDoctor\Meeting\Models\User;


use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 用户创建接口
 * Class UserCreateRequest
 * @package eDoctor\Meeting\Models\User
 */
class UserRegisterRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/register';


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


    private $type;

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }


    private $login;

    /**
     * @param int $isLogin
     */
    public function setIsLogin(int $isLogin)
    {
        $this->login = $isLogin;
    }

    private $platform;

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform = TypeData::DEFAULT_PLATFORM)
    {
        $this->platform = $platform;
    }

    private $nickname;

    /**
     * @param string $nickname
     */
    public function setNickName(string $nickname)
    {
        $this->nickname = $nickname;
    }


    private $email;

    /**
     * @param string $email
     * @throws RequestException
     */
    public function setEmail(string $email)
    {

        if (!Tool::verifyEmail($email)) throw new RequestException('请设置正确的email参数');
        $this->email = $email;
    }


    private $mobile;

    /**
     * @param string $mobile
     * @throws RequestException
     */
    public function setMobile(string $mobile)
    {

        if (!Tool::verifyMobile($mobile)) throw new RequestException('请设置正确的mobile参数');
        $this->mobile = $mobile;
    }

    private $realname;

    /**
     * @param string $realName
     */
    public function setRealName(string $realName)
    {
        $this->realname = $realName;
    }

    private $avatar;

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
    }

    private $password;

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    private $user_role;

    /**
     * @param int $userRole
     */
    public function setUserRole(int $userRole)
    {
        $this->user_role = $userRole;
    }

    private $openid;

    /**
     * @param string $openid
     */
    public function setOpenId(string $openid)
    {
        $this->openid = $openid;
    }


    private $unionid;

    /**
     * @param string $unionid
     */
    public function setUnionId(string $unionid)
    {
        $this->unionid = $unionid;
    }

    private $room_id;

    /**
     * @param string $roomId
     */
    public function setRoomId(string $roomId)
    {
        $this->room_id = $roomId;
    }

    private $room_role;

    /**
     * @param int $roomRole
     */
    public function setRoomRole(int $roomRole)
    {
        $this->room_role = $roomRole;
    }


    private $room_password;

    /**
     * @param string $roomPassword
     */
    public function setRoomPassword(string $roomPassword)
    {
        $this->room_password = $roomPassword;
    }

    private $wechat_openid;

    /**
     * @param string $wechatOpenid
     */
    public function setWechatOpenId($wechatOpenid)
    {
        $this->wechat_openid = $wechatOpenid;
    }

    private $wechat_unionid;

    /**
     * @param string $wechatUnionid
     */
    public function setWechatUnionid($wechatUnionid)
    {
        $this->wechat_unionid = $wechatUnionid;
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
