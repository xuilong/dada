<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 妥投异常之物品返回完成
 * 订单妥投异常后，订单状态变为9，骑士将物品进行返还，如果商家确认收到物品后，可以使用该 接口进行确认，订单状态变成10，同时订单终结。
 * Class ConfirmAbnormalGoods
 * @package youlong\api
 */
class ConfirmAbnormalGoods extends Base
{
    public $order_id; // 第三方订单编号
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_CONFIRM_GOODS_URL;
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