<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/8
 * Time: 下午1:57
 */

namespace eDoctor\Tests;

require_once 'Base.php';

use eDoctor\Meeting\Models\SurveyQuestion\SurveyQuestionAddRequest;
use eDoctor\Meeting\Models\SurveyQuestion\SurveyQuestionDeleteRequest;
use eDoctor\Meeting\Models\SurveyQuestion\SurveyQuestionDetailRequest;
use eDoctor\Meeting\Models\SurveyQuestion\SurveyQuestionListRequest;
use eDoctor\Meeting\Models\SurveyQuestion\SurveyQuestionUpdateRequest;



class SurveyQuestionTest extends Base
{


    function testSurveyQuestionListRequest(){

        $question = new SurveyQuestionListRequest(277);
        $res = $this->getClient()->request($question);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \eDoctor\Meeting\Exception\RequestException
     */
    function testSurveyQuestionAddRequest(){
        $question = new SurveyQuestionAddRequest(277);
        $question->setTitle('今天什么天气？');
        $question->setIntroduction('问题描述');
        $question->setQuestionType(1);
        $question->setIsMust(1);
        $options = [
          ['title' => '晴天', 'introduction' => '晴天'],
          ['title' => '阴天', 'introduction' => '阴天'],
          ['title' => '多云', 'introduction' => '多云'],
          ['title' => '大雨', 'introduction' => '大雨'],
        ];

        $question->setQuestionOptions($options);
        $res = $this->getClient()->request($question);

        $this->assertEquals($res['code'], 0);
    }



    function testSurveyQuestionUpdateRequest(){

        $question = new SurveyQuestionUpdateRequest(277,429);
        $question->setTitle('今天什么天气？');
        $question->setIntroduction('问题描述');
        $question->setQuestionType(1);
        $question->setIsMust(1);
        $options = [
            ['id' => 1255,'title' => '晴天1', 'introduction' => '晴天'],
            ['id' => 1256,'title' => '阴天2', 'introduction' => '阴天'],
            ['id' => 1257,'title' => '多云3', 'introduction' => '多云'],
            //['id' => 1258,'title' => '大雨4', 'introduction' => '大雨'],
        ];

        $question->setQuestionOptions($options);
        $res = $this->getClient()->request($question);
        $this->assertEquals($res['code'], 0);
    }



    function testSurveyQuestionDeleteRequest(){

        $question = new SurveyQuestionDeleteRequest(277,429);
        $res = $this->getClient()->request($question);
        var_dump($res);
        $this->assertEquals($res['code'], 0);
    }


    function testSurveyDetailDeleteRequest(){
        $question = new SurveyQuestionDetailRequest(277,433);
        $res = $this->getClient()->request($question);
        $this->assertEquals($res['code'], 0);
    }






}
