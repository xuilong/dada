<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

class OrderDetails extends Base
{
    public $order_id;
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_QUERY_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 第三方订单编号
     * @param $order_id
     */
    public function setOrderId($order_id)
    {
        !empty($order_id) ? $this->order_id = $order_id : self::error('order_id');
    }

    public function getOrderId()
    {
        return $this->order_id;
    }
}