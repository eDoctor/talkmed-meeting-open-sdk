<?php

namespace eDoctor\Meeting\Models\Survey;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\TlkRequest;


/**
 * 调研列表
 * Class SurveyListRequest
 * @package eDoctor\Meeting\Models\Survey
 */
class SurveyListRequest extends TlkRequest
{

    const REQUEST_METHOD = TypeData::METHOD_GET;

    const REQUEST_URI = 'open/survey';

    /**
     * SurveyListRequest constructor.
     */
    public function __construct()
    {
        $this->request_uri = self::REQUEST_URI;
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }


    private $is_show;


    /**
     * @param mixed $is_show
     */
    public function setIsShow(int $is_show)
    {
        $this->is_show = $is_show;
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
