<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/5/31
 * Time: 下午5:23
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\MeetingClient;
use eDoctor\Meeting\Models\Live\LiveAddSpeakerRequest;
use eDoctor\Meeting\Models\Live\LiveCreateRequest;
use eDoctor\Meeting\Models\Live\LiveDeleteRequest;
use eDoctor\Meeting\Models\Live\LiveDetailRequest;
use eDoctor\Meeting\Models\Live\LiveJoinRequest;
use eDoctor\Meeting\Models\Live\LiveListRequest;
use eDoctor\Meeting\Models\Live\LiveRecordRequest;
use eDoctor\Meeting\Models\Live\LiveScreensHotRequest;
use eDoctor\Meeting\Models\Live\LiveStatusRequest;
use eDoctor\Meeting\Models\Live\LiveUpdateRequest;

require_once 'Base.php';

/**
 * Class LiveTest
 * @package Meeting\Test
 */
class LiveTest extends Base
{

    public function testLiveRecordRequest() {

        $client  = (new MeetingClient(self::APP_ID, self::APP_SECRET))->setApiBaseUri(self::getEnv());
        $live = new LiveRecordRequest(1631372727);
        $res = $client->request($live);

        $this->assertEquals($res['code'],0);
    }




    public function testLiveJoinRequest()
    {
        $live = new LiveJoinRequest(2089596951);
        $live->setUserId(457);
        $live->setRoomRole(2);
        $live->setRoomPassword('023457');


       $options =  array(
            'user_id'       => 457,
            'room_role'     => 2,
            'room_password' => '023457'
        );

        $res = $this->getClient()->request($live);
        var_dump($res);
        $this->assertEquals($res['code'],0);

    }





    public function testLiveScreensHotRequest()
    {
        $live = new LiveScreensHotRequest(1631372727);
        $res = $this->getClient()->request($live);
        var_dump($res);
        $this->assertEquals($res['code'],0);
    }


    public function testLiveAddSpeakerRequest()
    {
        $speakers = [
                [
                'speaker_user_id' => 457,
                'speaker_password' => 'abc123'
                 ]
            ];

        $addSpeaker = new LiveAddSpeakerRequest(1631372727);
        $addSpeaker->setSpeakers($speakers);

        $res = $this->getClient()->request($addSpeaker);
        var_dump($res);

        $this->assertEquals($res['code'],0);

    }


    public function testLiveStatusRequest(){

        $live = new LiveStatusRequest(1631372727);
        $live->setStatus(0);

        $client = $this->getClient();
        $res =  $client->request($live);
        var_dump($res);
        $this->assertEquals($res['code'],0);
    }


    public function testLiveDeleteRequest(){

        $live = new LiveDeleteRequest(1753909660);
        $client = $this->getClient()->setApiBaseUri(self::getEnv());
        $res =  $client->request($live);

        var_dump($res);

        $this->assertEquals($res['code'],0);

    }


    public function testLiveListRequest(){

       $liveList = new LiveListRequest();

       $liveList->setPage(1);
       $client = $this->getClient()->setApiBaseUri(self::getEnv());

       $res =  $client->request($liveList);
        var_dump($res);

       $this->assertEquals(0,0);

    }



    public function testLiveDetailRequest(){

        $liveList = new LiveDetailRequest(1753909660);

        $client = $this->getClient()->setApiBaseUri(self::getEnv())->setApiVersion();

        $res =  $client->request($liveList);
        var_dump($res);

        $this->assertEquals(0,0);

    }



    /**
     * 会议创建测试用例
     */
    function testLiveCreateRequest() {


        $live = new LiveCreateRequest();

        $live->setTitle('test1');
        $live->setStartAt(date('Y-m-d 00:00:00'));
        $live->setEndAt(date('Y-m-d 23:59:59'));
        $live->setUserId(456);
        $live->setIntroduction('这是open test');

        $config = [
            'is_live_stream' => 1,
            'is_record' => 1
        ];
        $live->setExtendInfo($config);
        $live->setLiveType(1);
        $live->setIsSpeakerOnePassword(1);
        $live->setWatchPassword('123456');
        $live->setAccessType(1);

        $client = $this->getClient();
        $res = $client->setApiBaseUri($this->getEnv())->setApiVersion('v2')->request($live);

        var_dump($res);
        $this->assertContains('','');
    }




    /**
     * 会议创建测试用例
     */
    function testLiveEdit() {


        $live = new LiveUpdateRequest(1753909660);

        $live->setTitle('sdk_room_id');
        $live->setStartAt(date('Y-m-d 00:00:00'));
        $live->setEndAt(date('Y-m-d 23:59:59'));
        $live->setUserId(456);
        $live->setIntroduction('这是open test 111');
        $live->setAccessType(1);

        $config = [
            'is_live_stream' => 1,
            'is_record' => 1
        ];
        $live->setExtendInfo($config);
        $live->setLiveType(1);
        $live->setIsSpeakerOnePassword(1);
        $live->setWatchPassword('123456');

        $client = $this->getClient();
        $res = $client->setApiBaseUri($this->getEnv())->setApiVersion('v2')->request($live);

        var_dump($res);
        $this->assertContains('','');
    }

}
