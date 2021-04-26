<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 取消追加订单
 * 被取消的追加订单，状态变为待接单，其他配送员可见
 * Class CancelAppendOrder
 * @package youlong\api
 */
class CancelAppendOrder extends Base
{
    public $order_id; // 第三方订单号
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_APPOINT_CANCEL_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 第三方订单号
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