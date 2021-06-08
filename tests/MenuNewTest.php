<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午11:36
 */

namespace eDoctor\Tests;

use eDoctor\Meeting\Models\Menu\MenuAddRequest;
use eDoctor\Meeting\Models\Menu\MenuListRequest;
use eDoctor\Meeting\Models\Menu\MenuUpdateRequest;

require_once 'Base.php';



class MenuNewTest extends Base
{


    function testMenuAddRequest(){
        $menu = new MenuAddRequest(2089596951);
        $menu->setMenuTitle('测试菜6');
        $menu->setMenuTitleEn('test_menu6');
        $menu->setMenuContent('测试菜单');
        $menu->setMenuShow(1);
        $menu->setMenuType(0);

//        var_dump($menu);
        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testMenuListRequest(){

        $menu = new MenuListRequest(2089596951);
        //  var_dump(2132132);
//        $menu = new MenuAddRequest(2089596951);
//        $menu->setMenuTitle('测试菜1');
//        $menu->setMenuTitleEn('test_menu1');
//        $menu->setMenuContent('测试菜单');
//        $menu->setMenuShow(1);
//        $menu->setMenuType(0);
//
//        var_dump($menu);
        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }


    function testMenuUpdateRequest(){

        $menu = new MenuUpdateRequest(2089596951,);
        //  var_dump(2132132);
        $menu->setMenuTitle('测试菜1');
        $menu->setMenuTitleEn('test_menu1');
        $menu->setMenuContent('测试菜单');
        $menu->setMenuShow(1);
        $menu->setMenuType(0);
//
//        var_dump($menu);
        $res = $this->getClient()->request($menu);
        var_dump($res);

        $this->assertEquals(0, 0);
    }




}
