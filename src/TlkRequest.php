<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/5/30
 * Time: 下午1:03
 */

namespace eDoctor\Meeting;


use eDoctor\Meeting\Common\TypeData;

/**
 * Class TlkRequest
 * @package Meeting
 *
 * 各 Request 模型的 setOptions() 允许按需写入任意字段，
 * PHP 8.2+ 起对未声明属性赋值会触发 deprecation，这里显式放开。
 * 该 attribute 会被子类继承。
 */
#[\AllowDynamicProperties]
abstract class TlkRequest {


     const  REQUEST_URI = null;

     const REQUEST_METHOD = 'GET';

     const DEFAULT_API_VERSION = TypeData::API_VERSION;

     abstract function setOptions(array $options);

     abstract function getRequestUri() :string;

}
