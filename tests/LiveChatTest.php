<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午2:47
 */

namespace eDoctor\Tests;


use eDoctor\Meeting\Models\LiveChat\LiveChatAuditingRequest;
use eDoctor\Meeting\Models\LiveChat\LiveChatListRequest;

require_once 'Base.php';


class LiveChatTest extends Base
{

    public function testLiveCheckRequest(){

        $live = new LiveChatListRequest(2089596951);
        $res = $this->getClient()->request($live);
        print_r($res);

        $this->assertEquals($res['code'], 0);
    }


    public function testLiveChatAuditingRequest(){

        $live = new LiveChatAuditingRequest(2089596951, 985);
        $live->setAuditStatus(1);
        $res = $this->getClient()->request($live);

        print_r($res);
        $this->assertEquals($res['code'], 0);
    }
}
