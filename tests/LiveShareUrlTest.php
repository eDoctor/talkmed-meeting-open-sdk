<?php
/**
 * Created by PhpStorm.
 * User: lizhi.cao@edoctor.cn
 * Date: 2024/07/11
 * Time: 下午18:35
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\Models\LiveShareUrl\ShareUrlAddRequest;
use eDoctor\Meeting\Models\LiveShareUrl\ShareUrlDeleteRequest;
use eDoctor\Meeting\Models\LiveShareUrl\ShareUrlUpdateRequest;

require_once 'Base.php';

// ./vendor/bin/phpunit tests/LiveShareUrlTest.php
// ./vendor/bin/phpunit --filter testShareUrlUpdateRequest
class LiveShareUrlTest extends Base
{


    /**
     * @return void
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    function testShareUrlAddRequest()
    {
        $shareUrl = new ShareUrlAddRequest(1927313036);
        $shareUrl->setTitle('围观链接');
        $shareUrl->setType(3);
        $shareUrl->setPassword('');
        $shareUrl->setUrl('https://devphilips.meeting.talkmed.com');

        $res = $this->getClient()->request($shareUrl);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testShareUrlUpdateRequest()
    {
        $shareUrl = new ShareUrlUpdateRequest(1927313036,51);
        $shareUrl->setTitle('围观链接');
        $shareUrl->setType(3);
        $shareUrl->setPassword('');
        $shareUrl->setUrl('https://devphilips1.meeting.talkmed.com');


        $res = $this->getClient()->request($shareUrl);
        var_dump($res);

        $this->assertEquals(0, 0);
    }
//
//
//    function testShareUrlDeleteRequest()
//    {
//        $menu = new ShareUrlDeleteRequest(2089596951,46);
//
//        $res = $this->getClient()->request($menu);
//        var_dump($res);
//
//        $this->assertEquals(0, 0);
//    }

}
