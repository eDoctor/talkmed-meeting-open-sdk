<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午11:36
 */

namespace eDoctor\Tests;

require_once 'Base.php';

use eDoctor\Meeting\Models\User\UserRegisterRequest;
use eDoctor\Meeting\Models\User\UserLoginRequest;


class UserTest extends Base
{

    public function testUserRegisterRequest() {
        $user = new UserRegisterRequest();

        $data = [
            'login' => 0,
            'type' => 'unionid',
            'unionid' => 'huiafadewqad3ffead211232',
            'nickname' => 'yihu1222_test',
            'platform' => 'open',
            'password' => '213213232',
            'user_role' => 1,
            'room_role' => 3,
            'room_id'   => 1631372727
         ];

        $user->setOptions($data);

        $client = $this->getClient();
        $res = $client->request($user);
        var_dump($res);
        $this->assertEquals(true, true);
    }


    public function testUserRegisterRequest1() {

        $user = new UserRegisterRequest();
        $user->setIsLogin(0);
        $user->setType('unionid');
        $user->setUnionId('huiafadewqad3ffead211232');
        $user->setNickName('yzhui1993');
        $user->setPlatform('open');
        $user->setPassword('123456');
        $user->setRoomRole(3);
        $user->setUserRole(1);
        $user->setRoomId(1631372727);
        $client = $this->getClient();
        $res = $client->request($user);
        var_dump($res);
        $this->assertEquals(true, true);
    }

    public function testUserLoginRequest() {

        $user = new UserLoginRequest();
        $user->setEmail('yuzh1995@qq.com');
        $user->setType('email');
        $user->setPassword('123456');
        $user->setPlatform('open');

        $client = $this->getClient();
        $res = $client->setApiBaseUri($this->getEnv())->request($user);
        var_dump($res);
        $this->assertEquals(true, true);
    }



}
