<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午2:18
 */

namespace eDoctor\Meeting\Exception;


/**
 * Class RequestException
 * @package Meeting\Exception
 */
class RequestException extends \Exception
{
    public function  __construct($errorMessage, $errorCode = 404)
    {
        throw new \Exception($errorMessage, $errorCode);
    }
}
