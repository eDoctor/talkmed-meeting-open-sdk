<?php

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\Data\AboutLiveRequest;
use eDoctor\Meeting\Models\Data\AccessRecordsRequest;
use eDoctor\Meeting\Models\Data\LiveBaseRequest;
use eDoctor\Meeting\Models\Data\LiveReportRequest;
use eDoctor\Meeting\Models\Data\OnlineRecordLogsRequest;

require_once 'Base.php';

class DataTest extends Base
{

    const DATA_ROOM_ID = '';

    public function testAboutLiveRequest(){
        $data = new AboutLiveRequest(self::DATA_ROOM_ID);

        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }

    public function testAccessRecordsRequest(){
        $data = new AccessRecordsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }

    public function testLiveBaseRequest(){
        $data = new LiveBaseRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }


    public function testLiveReportRequest(){
        $data = new LiveReportRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }


    public function testOnlineRecordLogsRequest(){
        $data = new OnlineRecordLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }


    public function test(){
        $data = new OnlineRecordLogsRequest(self::DATA_ROOM_ID);
        $res = $this->getClient()->request($data);
        var_dump($res);
        $this->assertEquals($res['code'], $res);
    }






}
