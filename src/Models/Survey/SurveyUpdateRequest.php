<?php

namespace eDoctor\Meeting\Models\Survey;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研修改
 * Class SurveyUpdateRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyUpdateRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_PUT;


    const REQUEST_URI = 'open/survey/%d';

    /**
     * SurveyUpdateRequest constructor.
     * @param $surveyId
     * @throws RequestException
     */
    public function __construct($surveyId)
    {
        if (empty($surveyId)) throw new RequestException('初始化uri: 缺少survey_id参数');
        $this->request_uri = sprintf(self::REQUEST_URI, $surveyId);
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
    public function setTitle(string $title)
    {
        $this->title = $title;
    }


    private $introduction;

    /**
     * @param mixed $introduction
     */
    public function setIntroduction(string $introduction)
    {
        $this->introduction = $introduction;
    }


    private $banner;

    /**
     * @param mixed $banner
     */
    public function setBanner(int $banner)
    {
        $this->banner = $banner;
    }


    private $module;

    /**
     * @param mixed $module
     */
    public function setModule(int $module)
    {
        $this->module = $module;
    }


    private $module_id;

    /**
     * @param mixed $module_id
     */
    public function setModuleId(int $module_id)
    {
        $this->module_id = $module_id;
    }



    private $is_show;


    /**
     * @param mixed $is_show
     */
    public function setIsShow(int $is_show)
    {
        $this->is_show = $is_show;
    }


    private $is_answer_show;


    /**
     * @param mixed $is_answer_show
     */
    public function setIsAnswerShow(int $is_answer_show)
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

