<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/4
 * Time: 下午11:50
 */

namespace eDoctor\Tests;

require_once '../vendor/autoload.php';

ini_set('display_errors','on');
ini_set('display_errors','on');


use eDoctor\Meeting\MeetingClient;
use PHPUnit\Framework\TestCase;


class Base extends TestCase
{

    const IS_DEV = true; //设置当前 test 运行接口的环境

//    const APP_ID = 'xxxxx';
//    const APP_SECRET = 'xxxxxxxxxxxxxxx';

    const APP_ID = 'tk60bd8aefed173';
    const APP_SECRET = '888794ca3931028a65ff3709a5cc0979';

    const DEV_BASE_URI = 'https://devapimeeting.talkmed.com';
    const PRO_BASE_URI = 'https://apimeeting.talkmed.com';

    function getClient() :MeetingClient {

        $client  = new MeetingClient(self::APP_ID, self::APP_SECRET);
        $client->setApiBaseUri(self::getEnv());
        return $client;
    }

    static function getEnv() :string {
        if(self::IS_DEV) return self::DEV_BASE_URI;
        return self::PRO_BASE_URI;
    }
}
