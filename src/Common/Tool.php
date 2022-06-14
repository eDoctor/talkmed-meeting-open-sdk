<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/5/31
 * Time: 下午3:50
 */

namespace eDoctor\Meeting\Common;


/**
 * Class Common
 * @package Meeting\Common
 */
class Tool
{

    /**
     * 获取 open api 接口的 signature
     * @param string $appId
     * @param string $appSecret
     * @param $time
     * @return string
     */
    public static function getOpenApiSignature(string $appId, string $appSecret, $time): string
    {

        return hash("sha256", sprintf('%s-%s-%s', $appId, $appSecret, $time));
    }


    /**
     * 获取meeting站点授权拼接参数
     * @param string $host
     * @param string $appId
     * @param string $appSecret
     * @param string $autToken
     * @param int $roomId
     * @param int $role
     * @param string $platform
     * @param string $password
     * @param string $channel
     * @return string
     */
    public static function getAuthorizeUri(string $host, string $appId, string $appSecret, string $autToken, int $roomId, int $role, string $platform = 'web', string $password = '', string $channel = '', string $redirectType = '', string $title = ''): string
    {
        $time = time();
        $signature = hash('sha256', sprintf('%s-%s-%s-%s', $appId, $appSecret, $autToken, $time));
        $params = [
            'app_id' => $appId,
            'auth_token' => $autToken,
            'timestamp' => $time,
            'signature' => $signature,
            'platform' => $platform,
            'room_id' => $roomId,
            'role' => $role,
            'channel' => $channel ?? '',
            'password' => $password
        ];
        if ($redirectType) {
            $params['redirect_type'] = $redirectType;
        }
        if ($title) {
            $params['title'] = $title;
        }

        $urlParamsStr = http_build_query($params);
        return sprintf('%s/oauth/authorize?%s', $host, $urlParamsStr);
    }


    /**
     * 验证日期
     * @param string $dateTime
     * @return bool
     */
    static function verifyDate(string $dateTime): bool
    {

        return strtotime($dateTime) ? true : false;
    }


    /**
     * @param string $mobile
     * @return bool
     */
    static function verifyMobile(string $mobile): bool
    {
        return preg_match("/^1[3-9]{1}[0-9]{9}$/", $mobile) === 1;
    }


    /**
     * @param string $email
     * @return bool
     */
    static function verifyEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    static public function isHttps($url): bool
    {
        $preg = "/^http(s)?:\\/\\/.+/";
        if (preg_match($preg, $url)) return true;
        return false;
    }

}

