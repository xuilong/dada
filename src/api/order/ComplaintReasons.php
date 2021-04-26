<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 获取商家投诉达达原因
 * 商家投诉达达，需要传递投诉原因ID，通过此接口获取投诉原因列表
 * 注：当没有业务参数的时候, body需要赋值为空字符串,即body:""。
 * Class ComplaintReasons
 * @package youlong\api
 */
class ComplaintReasons extends Base
{
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::COMPLAINT_REASONS_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }
}