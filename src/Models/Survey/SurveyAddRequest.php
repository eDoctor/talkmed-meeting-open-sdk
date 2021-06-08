<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/7
 * Time: 下午3:54
 */
namespace eDoctor\Meeting\Models\Survey;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研添加
 * Class SurveyAddRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyAddRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/survey';

    public function __construct()
    {
        $this->request_uri =  self::REQUEST_URI;
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }


    private $title;

    /**
     * @param mixed $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    private $introduction;

    /**
     * @param mixed $introduction
     */
    public function setIntroduction(string $introduction): void
    {
        $this->introduction = $introduction;
    }


    private $banner;

    /**
     * @param mixed $banner
     */
    public function setBanner(int $banner): void
    {
        $this->banner = $banner;
    }


    private $module;

    /**
     * @param mixed $module
     */
    public function setModule(int $module): void
    {
        $this->module = $module;
    }


    private $module_id;

    /**
     * @param mixed $module_id
     */
    public function setModuleId(int $module_id): void
    {
        $this->module_id = $module_id;
    }


    private $is_answer_show;


    /**
     * @param mixed $is_answer_show
     */
    public function setIsAnswerShow(int $is_answer_show): void
    {
        $this->is_answer_show = $is_answer_show;
    }

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options) {

        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
