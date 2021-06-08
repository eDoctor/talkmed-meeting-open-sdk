<?php

namespace eDoctor\Meeting\Models\SurveyQuestion;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研问题更新
 * Class SurveyQuestionUpdateRequest
 * @package eDoctor\Meeting\Models\SurveyQuestion
 */
class SurveyQuestionUpdateRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_PUT;


    const REQUEST_URI = 'open/survey/%d/question/%d';


    /**
     * SurveyQuestionUpdateRequest constructor.
     * @param $surveyId
     * @param $questionId
     * @throws RequestException
     */
    public function __construct($surveyId, $questionId)
    {
        if (empty($surveyId) || empty($questionId)) throw new RequestException('初始化uri: 缺少surveyId/questionId参数');
        $this->request_uri = sprintf(self::REQUEST_URI, $surveyId, $questionId);
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


    private $is_must;

    /**
     * @param mixed $is_must
     */
    public function setIsMust(int $is_must): void
    {
        $this->is_must = $is_must;
    }


    private $question_type;


    /**
     * @param mixed $question_type
     */
    public function setQuestionType(int $question_type): void
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
