<?php

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\Data\AboutLiveRequest;
use eDoctor\Meeting\Models\Data\AccessRecordsRequest;
use eDoctor\Meeting\Models\Data\LiveBaseRequest;
use eDoctor\Meeting\Models\Data\LiveReportRequest;
use eDoctor\Meeting\Models\Data\OnlineRecordLogsRequest;
use eDoctor\Meeting\Models\Data\SurveyInfosRequest;
use eDoctor\Meeting\Models\Data\SurveyRecordRequest;
use eDoctor\Meeting\Models\Data\UserActionLogsRequest;
use eDoctor\Meeting\Models\Data\UserAllLogsRequest;
use eDoctor\Meeting\Models\Data\UserJoinLogsRequest;
use eDoctor\Meeting\Models\Data\UserLiveAllLogsRequest;
use eDoctor\Meeting\Models\Data\UserLiveLogsByRtcTimeRequest;

require_once 'Base.php';

class DataTest extends Base
{

    const DATA_ROOM_ID = '285405984';

    public function testAboutLiveRequest(){
        $data = new AboutLiveRequest(self::DATA_ROOM_ID);

        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }

    public function testAccessRecordsRequest(){
        $data = new AccessRecordsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }

    public function testLiveBaseRequest(){
        $data = new LiveBaseRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testLiveReportRequest(){
        $data = new LiveReportRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testOnlineRecordLogsRequest(){
        $data = new OnlineRecordLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);

        echo json_encode($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testSurveyInfosRequest(){
        $data = new SurveyInfosRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        echo json_encode($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testSurveyRecordRequest()
    {
        $data = new SurveyRecordRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testUserActionLogsRequest()
    {
        $data = new UserActionLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testUserAllLogsRequest()
    {
        $data = new UserAllLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testUserJoinLogsRequest()
    {
        $data = new UserJoinLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function testUserLiveAllLogsRequest()
    {
        $data = new UserLiveAllLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }


    public function test()
    {
        $data = new UserLiveLogsByRtcTimeRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        print_r($res);
        $this->assertEquals($res['code'], 0);
    }

}
