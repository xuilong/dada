<?php
namespace youlong\api\recharge;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 获取充值链接
 * Class Recharge
 * @package youlong\api\recharge
 */
class Recharge extends Base
{
    public $amount; // 充值金额（单位元，可以精确到分）
    public $category; // 生成链接适应场景（category有二种类型值：PC、H5）
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::RECHARGE_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 充值金额（单位元，可以精确到分）
     * @param $amount
     */
    public function setAmount($amount)
    {
        !empty($amount) ? $this->amount = $amount : self::error('amount');
    }

    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * 生成链接适应场景（category有二种类型值：PC、H5）
     * @param $category
     */
    public function setCategory($category)
    {
        !empty($category) ? $this->category = $category : self::error('category');
    }

    public function getCategory()
    {
        return $this->category;
    }

    /**
     * 支付成功后跳转的页面（支付宝在支付成功后可以跳转到某个指定的页面，微信支付不支持）
     * @param $notify_url
     */
    public function setNotifyUrl($notify_url)
    {
        !empty($notify_url) ? $this->notify_url = $notify_url : self::error('notify_url');
    }

    public function getNotifyUrl()
    {
        return $this->notify_url;
    }
}