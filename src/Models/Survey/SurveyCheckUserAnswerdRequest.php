<?php

namespace eDoctor\Meeting\Models\Survey;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研列表
 * Class SurveyListRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyCheckUserAnswerdRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/survey/%d/check_user_answerd';

    /**
     * SurveyListRequest constructor.
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

    public $user_id;

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public $module;

    public function setModule($module)
    {
        $this->module = $module;
    }

    public $module_id;

    public function setModuleId($module_id)
    {
        $this->module_id = $module_id;
    }

    /**
     * @param array $options
     * @throws \Exception
     */
    public function setOptions(array $options)
    {

        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
