<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午2:47
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\LiveFlyCheck\LiveCheckLayoutRequest;
use eDoctor\Meeting\Models\LiveFlyCheck\LiveCheckMemberRequest;
use eDoctor\Meeting\Models\LiveFlyCheck\LiveCheckRequest;

require_once 'Base.php';



class LiveCheckTest extends Base
{
    public function testLiveCheckRequest(){

        $live = new LiveCheckRequest();

        $res = $this->getClient()->request($live);

        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testLiveCheckLayoutRequest()
    {

        $live = new LiveCheckLayoutRequest(2089596951);

        $res = $this->getClient()->request($live);

        print_r($res);
        $this->assertEquals($res['code'], 0);
    }



    public function testLiveCheckMemberRequest()
    {

        $live = new LiveCheckMemberRequest(2089596951);

        $res = $this->getClient()->request($live);

        print_r($res);
        $this->assertEquals($res['code'], 0);
    }
}
