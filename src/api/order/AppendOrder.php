<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 追加订单
 * 1. 追加的订单必须是该门店发出的处于待接单状态的订单
 * 2. 只能从符合条件的配送员列表选取配送员进行追加,参考查询追加配送员
 * https://newopen.imdada.cn/#/development/file/listTransportersToAppoint?_k=t9bfod
 * Class AppendOrder
 * @package youlong\api
 */
class AppendOrder extends Base
{
    public $order_id; // 追加的第三方订单ID
    public $transporter_id; // 追加的配送员ID
    public $shop_no; // 追加订单的门店编码
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_APPOINT_EXIST_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 追加的第三方订单ID
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

    /**
     * 追加的配送员ID
     * @param $transporter_id
     */
    public function setTransporterId($transporter_id)
    {
        !empty($transporter_id) ? $this->transporter_id = $transporter_id : self::error('transporter_id');
    }

    public function getTransporterId()
    {
        return $this->transporter_id;
    }

    /**
     * 追加订单的门店编码
     * @param $shop_no
     */
    public function setShopNo($shop_no)
    {
        !empty($shop_no) ? $this->shop_no = $shop_no : self::error('shop_no');
    }

    public function getShopNo()
    {
        return $this->shop_no;
    }
}