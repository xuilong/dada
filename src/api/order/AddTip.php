<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 添加小费
 * Class AddTip
 * @package youlong\api
 */
class AddTip extends Base
{
    public $order_id; // 第三方订单编号
    public $tips; // 小费金额(精确到小数点后一位，单位：元)
    public $city_code; // 订单城市区号
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_ADDTIP_URL;
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

    public function geOrderIdt()
    {
        return $this->order_id;
    }

    /**
     * 小费金额(精确到小数点后一位，单位：元)
     * @param $tips
     */
    public function setTips($tips)
    {
        !empty($tips) ? $this->tips = $tips : self::error('tips');
    }

    public function getTips()
    {
        return $this->tips;
    }

    /**
     * 订单城市区号
     * @param $city_code
     */
    public function setCityCode($city_code)
    {
        !empty($city_code) ? $this->city_code = $city_code : self::error('city_code');
    }

    public function getCityCode()
    {
        return $this->city_code;
    }

    /**
     * 备注(字段最大长度：512)
     * @param $info
     */
    public function setInfo($info)
    {
        !empty($info) ? $this->info = $info : self::error('info');
    }

    public function getInfo()
    {
        return $this->info;
    }
}