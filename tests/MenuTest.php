<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午5:35
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\Menu\MenuAddRequest;
use eDoctor\Meeting\Models\Menu\MenuDeleteRequest;
use eDoctor\Meeting\Models\Menu\MenuListRequest;
use eDoctor\Meeting\Models\Menu\MenuSortRequest;
use eDoctor\Meeting\Models\Menu\MenuUpdateRequest;

require_once 'Base.php';

class MenuTest extends Base
{
    function test()
    {
        $menu = new MenuListRequest(2089596951);
        $res = $this->getClient()->request($menu);
        var_dump($res);
        $this->assertEquals(0, 0);
    }

    function testMenuAddRequest()
    {
        $menu = new MenuAddRequest(2089596951);
        $menu->setMenuTitle('测试菜7');
        $menu->setMenuTitleEn('test_menu7');
        $menu->setMenuContent('测试菜单');
        $menu->setMenuShow(1);
        $menu->setMenuType(0);

        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testMenuUpdateRequest()
    {
        $menu = new MenuUpdateRequest(2089596951,47);
        $menu->setMenuTitle('测试菜2__edit');
        $menu->setMenuTitleEn('test_menu2_edit');
        $menu->setMenuContent('测试菜单');
        $menu->setMenuShow(1);
        $menu->setMenuType(0);

        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testMenuDeleteRequests()
    {
        $menu = new MenuDeleteRequest(2089596951,46);

        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testMenuSortRequests()
    {
        $menu = new MenuSortRequest(2089596951);
        $sort = ['45','Survey','Chat','files'];
        $menu->setSort($sort);

        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }
}
