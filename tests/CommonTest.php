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
