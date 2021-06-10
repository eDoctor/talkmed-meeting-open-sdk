<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/6
 * Time: 下午3:05
 */

namespace eDoctor\Tests;

require_once 'Base.php';

use eDoctor\Meeting\Common\Tool;

class CommonTest extends Base
{

    function testGetAuthorizeUri(){
        $str =  Tool::getAuthorizeUri('https://devmeeting.talkmed.com',self::APP_ID,self::APP_SECRET,'e96a4dba-4eb2-dd1d-7fa3-bdfcd36d98d7','1631372727','2','web','');

        var_dump($str);
    }

    function testSignature() {
        $a =  Tool::getOpenApiSignature(self::APP_ID, self::APP_SECRET, 1622963549);
        var_dump($a);

       $this->assertEquals(true,true);
    }


    function testFileAction(){

        $path = '/data/';
        $filename = '13750.pdf';

        var_dump(new \CURLFile($path,'', $filename));
        var_dump(fopen($path.$filename, 'r'));

    }



}
