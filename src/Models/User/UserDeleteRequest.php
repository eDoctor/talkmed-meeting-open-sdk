<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2022/02/23
 * Time: 下午17:24
 */
namespace eDoctor\Meeting\Models\User;

use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议表单绑定
 * Class FormBindRequest
 * @package App\Libs\MeetingSdk
 */
class UserDeleteRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_DELETE;

    const REQUEST_URI = 'open/user/%d';

    /**
     * FormReportRequest constructor.
     * @param int $userId
     * @throws RequestException
     */
    public function __construct(int $userId) {
        if (empty($userId)) throw new RequestException('初始化uri: 缺少user_id参数');
        $this->request_uri = sprintf(self::REQUEST_URI, $userId);
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
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if (in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
