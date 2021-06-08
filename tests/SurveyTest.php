<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 上午11:00
 */

namespace eDoctor\Tests;


use eDoctor\Meeting\Models\Survey\SurveyAddRequest;
use eDoctor\Meeting\Models\Survey\SurveyDeleteRequest;
use eDoctor\Meeting\Models\Survey\SurveyDetailRequest;
use eDoctor\Meeting\Models\Survey\SurveyListRequest;
use eDoctor\Meeting\Models\Survey\SurveyStatusRequest;
use eDoctor\Meeting\Models\Survey\SurveyUpdateRequest;

require_once 'Base.php';

class SurveyTest extends Base
{


    function testSurveyStatusRequest() {

        $survey = new SurveyStatusRequest(277);
        $survey->setIsShow(1);

        $res = $this->getClient()->request($survey);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }

    function testSurveyAddRequest() {

        $survey = new SurveyAddRequest();
        $survey->setTitle('测试调研3');
        $survey->setIntroduction('测试描述3');
        $survey->setModule(1);
        $survey->setModuleId(2089596951);
        $survey->setIsAnswerShow(1);

        $res = $this->getClient()->request($survey);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    function testSurveyUpdateRequest() {

        $survey = new SurveyUpdateRequest(276);
        $survey->setTitle('测试调研3-edit');
        $survey->setIsShow(0);
        $res = $this->getClient()->request($survey);

        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    function testSurveyDetailRequest(){

        $survey = new SurveyDetailRequest(275);
        $res = $this->getClient()->request($survey);

        var_dump($res);
        $this->assertEquals($res['code'], 0);

    }


    function testSurveyListRequest(){

        $survey = new SurveyListRequest();
        $survey->setModuleId(2089596951);
        $survey->setModule(1);

        $res = $this->getClient()->request($survey);

        var_dump($res);
        $this->assertEquals($res['code'], 0);

    }



    function testSurveyDeleteRequest() {

        $survey = new SurveyDeleteRequest(274);

        $res = $this->getClient()->request($survey);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }
}
