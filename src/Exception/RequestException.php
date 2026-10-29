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
    /**
     * @param string $errorMessage
     * @param int $errorCode
     */
    public function __construct($errorMessage = '', $errorCode = 404)
    {
        // 此前这里直接 throw 新的 \Exception，导致 RequestException 永远无法被 catch 到，
        // 且第二个参数传入非 int 时会触发 TypeError（PHP 8 强类型）。
        parent::__construct((string)$errorMessage, (int)$errorCode);
    }
}