<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/11/17
 * Time: 下午3:30
 */
namespace eDoctor\Meeting\Models\WhiteList;


use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议白名单绑定
 * Class FormBindRequest
 * @package App\Libs\MeetingSdk
 */
class WhitelistAddRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room/%d/white_list';

    /**
     * WhitelistAddRequest constructor.
     * @param int $roomId
     * @throws RequestException
     */
    public function __construct(int $roomId) {

        if (empty($roomId)) throw new RequestException('初始化uri: 缺少room_id参数 ');
        $this->request_uri = sprintf(self::REQUEST_URI, $roomId);
    }

    private $request_uri;

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }

    private $type;

    /**
     * @param int $type
     */
    public function setType(int $type) {
        $this->type = $type;
    }

    private $content;

    /**
     * @param string $content
     */
    public function setContent(string $content) {
        $this->content = $content;
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
