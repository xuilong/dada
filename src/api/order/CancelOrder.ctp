<?php
namespace youlong\api\order;

use youlong\config\UrlConfig;

/**
 * 取消订单
 * 在订单待接单或待取货情况下，调用此接口可取消订单。
 * 取消费用说明：接单1 分钟以内取消不扣违约金；
 * 接单后1－15分钟内取消订单，运费退回。同时扣除2元作为给配送员的违约金；
 * 配送员接单后15 分钟未到店，商户取消不扣违约金；
 * 系统取消订单说明：超过72小时未接单系统自动取消。每天凌晨2点，取消大于72小时未完成的订单。
 * Class CancellationOrder
 * @package youlong\api
 */
class CancelOrder extends Base
{
    public $order_id; // 第三方订单编号
    public $cancel_reason_id; // 取消原因ID
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_FORMAL_CANCEL_URL;
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

    /**
     * 取消原因ID
     * https://newopen.imdada.cn/#/development/file/reasonList?_k=pv2yj2
     * @param $cancel_reason_id
     */
    public function setCancelReasonId($cancel_reason_id)
    {
        !empty($cancel_reason_id) ? $this->cancel_reason_id = $cancel_reason_id : self::error('cancel_reason_id');
    }

    public function getCancelReasonId()
    {
        return $this->cancel_reason_id;
    }
}