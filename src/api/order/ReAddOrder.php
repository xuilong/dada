<?php
namespace youlong\api\order;

use youlong\config\UrlConfig;

/**
 * 订单重发
 * Class ReAddOrder
 * @package youlong\api
 */
class ReAddOrder extends BaseOrder
{
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_READD_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }
}