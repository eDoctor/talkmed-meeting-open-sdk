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
 */
abstract class TlkRequest {


     const  REQUEST_URI = null;

     const REQUEST_METHOD = 'GET';

     const DEFAULT_API_VERSION = TypeData::API_VERSION;

     abstract function setOptions(array $options);

     abstract function getRequestUri() :string;

}
