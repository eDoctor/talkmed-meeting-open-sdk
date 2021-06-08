<?php
/**
 * Created by PhpStorm.
 * User: yuzihui
 * Date: 2021/6/3
 * Time: 下午4:08
 */

namespace eDoctor\Meeting\Models\Live;

use eDoctor\Meeting\Common\Tool;
use eDoctor\Meeting\Common\TypeData;
use eDoctor\Meeting\Exception\RequestException;
use eDoctor\Meeting\TlkRequest;


/**
 * 会议创建
 * Class LiveCreateRequest
 * @package Meeting\Models\Live
 */
class LiveCreateRequest extends TlkRequest {

    const REQUEST_METHOD  = TypeData::METHOD_POST;

    const REQUEST_URI = 'open/room';

    private $request_uri;

    /**
     * 初始化请求地址
     * UserCreateRequest constructor.
     */
    public function __construct() {
        $this->request_uri =  self::REQUEST_URI;
    }


    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->request_uri;
    }


    private $title;

    /**
     * @param string $val
     */
    public function setTitle(string $val) {
        $this->title = (string) $val;
    }

    private $start_at;

    /**
     * @param string $date
     * @throws RequestException
     */
    public function setStartAt(string $date) {
        if (!Tool::verifyDate($date)) throw new RequestException('start_at 应为日期 例如:2021-06-08 00:00:00');
        $this->start_at = (string) $date;
    }


    private $end_at;

    /**
     * @param string $date
     * @throws RequestException
     */
    public function setEndAt(string $date) {
        if (!Tool::verifyDate($date)) throw new RequestException('end_at 应为日期 例如:2021-06-08 23:59:59');
        $this->end_at = (string) $date;
    }


    private $live_type;

    /**
     * @param int $type
     */
    public function setLiveType(int $type) {
        $this->live_type = (int) $type;
    }


    private $introduction;

    /**
     * 设置描述
     * @param string $introduction
     */
    public function setIntroduction(string $introduction) {
        $this->introduction = (string) $introduction;
    }


    private $banner;

    /**
     * 设置banner
     * @param string $banner
     */
    public function setBanner(string $banner) {
        $this->banner = (string) $banner;
    }


    /**
     * 设置会议扩展信息
     * @var
     */
    private $extend_info;

    /**
     * @param array $extendInfo
     */
    public function setExtendInfo(array $extendInfo = []) {
        $this->extend_info = $extendInfo;
    }


    private $user_id;

    /**
     * 设置主播
     * @param int $userId
     */
    public function setUserId(int $userId) {
        $this->user_id = $userId;
    }


    private $is_speaker_one_password;

    /**
     * @param int $isSpeakerOnePassword
     */
    public function setIsSpeakerOnePassword(int $isSpeakerOnePassword) {
        $this->is_speaker_one_password = $isSpeakerOnePassword;
    }


    private $speakers;

    /**
     * @param array $speakers\
     */
    public function setSpeakers(array $speakers) {
        $this->speakers = $speakers;
    }


    private $access_type;

    /**
     * @desc 直播访问方式设置
     * @param  int $accessType
     */
    public function setAccessType($accessType) {
        $this->access_type = $accessType;
    }


    private $watch_password;

    /**
     * @param string $watchPassword
     */
    public function setWatchPassword(string $watchPassword) {
        $this->watch_password = $watchPassword;
    }


    private $stream_provider;

    /**
     * @desc 云服务商 1:阿里云 2:腾讯云 默认1
     * @param int $stream_provider
     */
    public function setStreamProvider(int $stream_provider) {
        $this->stream_provider = $stream_provider;
    }

    /**
     * 统一赋值
     * @param $options
     */
    public function setOptions(array $options) {
        foreach ($options as $field => $vale) {
            if(in_array($field, TypeData::FILTER_VARS)) continue;
            $this->$field = $vale;
        }
    }

}
