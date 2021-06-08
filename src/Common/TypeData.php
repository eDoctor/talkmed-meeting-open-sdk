<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午6:07
 */

namespace eDoctor\Meeting\Common;


/**
 * 类型集合
 * Class TypeData
 * @package Meeting\Common
 */
class TypeData {

    /**
     * 注册登录 platform 定值：open
     */
    const DEFAULT_PLATFORM = 'open';

    /**
     * 请求方式
     */
    const METHOD_POST   = 'POST';
    const METHOD_GET    = 'GET';
    const METHOD_PUT    = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_UPLOAD = 'UPLOAD';

    /**
     * 会议相关类型定义
     */
    const LIVE_TYPE_REAL_AUDIO = 1;
    const LIVE_TYPE_CLOUD_LIVE = 2;

    const LIVE_TYPE_DESC = [
        self::LIVE_TYPE_REAL_AUDIO => '实时音视频',
        self::LIVE_TYPE_CLOUD_LIVE => '云直播'
    ];

    //请求过滤字段
    const FILTER_VARS = ['request_uri'];




}
