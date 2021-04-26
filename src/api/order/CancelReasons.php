<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 获取取消原因
 * 调用取消订单接口时，需要传递取消原因ID，通过此接口获取订单取消理由列表
 * 注：当没有业务参数的时候, body需要赋值为空字符串,即body:""。
 * Class CancelReasons
 * @package youlong\api
 */
class CancelReasons extends Base
{
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_CANCEL_REASONS_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }
}