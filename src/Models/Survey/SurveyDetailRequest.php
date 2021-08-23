<?php

namespace eDoctor\Meeting\Models\Survey;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研详情
 * Class SurveyDetailRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyDetailRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/survey/%d';

    /**
     * SurveyDetailRequest constructor.
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
