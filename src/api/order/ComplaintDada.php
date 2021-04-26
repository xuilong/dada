<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 商家投诉达达
 * 达达配送员接单后，商家如果对达达服务不满意，均可以使用该接口对达达进行投诉。
 * Class ComplaintDada
 * @package youlong\api
 */
class ComplaintDada extends Base
{
    public $order_id; // 第三方订单编号
    public $reason_id; // 投诉原因ID
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::COMPLAINT_DADA_URL;
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
     * 投诉原因ID（投诉原因列表）
     * https://newopen.imdada.cn/#/development/file/complaintReasons?_k=jme57y
     * @param $reason_id
     */
    public function setReasonId($reason_id)
    {
        !empty($reason_id) ? $this->reason_id = $reason_id : self::error('reason_id');
    }

    public function getReasonId()
    {
        return $this->reason_id;
    }
}