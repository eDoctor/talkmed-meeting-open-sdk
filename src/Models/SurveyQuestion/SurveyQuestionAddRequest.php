<?php

namespace eDoctor\Meeting\Models\SurveyQuestion;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研问题添加
 * Class SurveyAddRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyQuestionAddRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_POST;


    const REQUEST_URI = 'open/survey/%d/question';

    /**
     * SurveyQuestionAddRequest constructor.
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


    private $is_must;

    /**
     * @param mixed $is_must
     */
    public function setIsMust(int $is_must)
    {
        $this->is_must = $is_must;
    }


    private $question_type;


    /**
     * @param mixed $question_type
     */
    public function setQuestionType(int $question_type)
    {
        $this->question_type = $question_type;
    }



    private $options;

    /**
     * @param array $options
     */
    public function setQuestionOptions(array $options)
    {
        $this->options = $options;
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
