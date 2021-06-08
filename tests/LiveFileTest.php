<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午4:04
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\LiveFile\FileBindDeleteRequest;
use eDoctor\Meeting\Models\LiveFile\FileBindListRequest;
use eDoctor\Meeting\Models\LiveFile\FileBindRequest;
use eDoctor\Meeting\Models\LiveFile\FileDeleteRequest;
use eDoctor\Meeting\Models\LiveFile\FileListRequest;
use eDoctor\Meeting\Models\LiveFile\FilePrintListRequest;
use eDoctor\Meeting\Models\LiveFile\FileUploadRequest;

require_once 'Base.php';

class LiveFileTest extends Base
{


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \eDoctor\Meeting\Exception\RequestException
     */
    function testFilePrintListRequest()
    {
        $fileId = 9;
        $file = new FilePrintListRequest($fileId);

        $res = $this->getClient()->request($file);

        var_dump($res);

        $this->assertEquals($res['code'], 0);
    }


    function testFileDeleteRequest()
    {
        $fileId = 9;
        $file = new FileDeleteRequest($fileId);

        $res = $this->getClient()->request($file);


        var_dump($res);

        $this->assertEquals($res['code'], 0);
    }


    function testFileUploadRequest()
    {
        $file = new FileUploadRequest();
        $file->setUserId(456);
        $file->setRoomId(2089596951);

        $path = '/data/test.pdf';
        $filename = 'test.pdf';

        $file->setFile($path, $filename);
        $res = $this->getClient()->request($file);


        $this->assertEquals($res['code'], 0);
    }


    function testFileListRequest()
    {
        $file = new FileListRequest();
        $file->setType(3);

        $list = $this->getClient()->request($file);

        print_r($list);
        $this->assertEquals($list['code'], 0);
    }


    function testFileBindRequest() {
        $file = new FileBindRequest(1631372727);

        $file->setFileIds(array(550));
        $res = $this->getClient()->request($file);

        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }



    function testFileBindListRequest(){

        $file = new FileBindListRequest(2089596951);
        $res = $this->getClient()->request($file);

        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }



    function testFileBindDeleteRequest(){

        $file = new FileBindDeleteRequest(2089596951);
        $file->setFileIds([9, 547]);
        $res = $this->getClient()->request($file);

        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


}
