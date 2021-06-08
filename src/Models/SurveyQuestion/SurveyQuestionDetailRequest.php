<?php

namespace eDoctor\Meeting\Models\SurveyQuestion;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研详情
 * Class SurveyDetailRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyQuestionDetailRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/survey/%d/question/%d';


    /**
     * SurveyQuestionDetailRequest constructor.
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
