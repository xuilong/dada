<?php
namespace youlong\api\order;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 查询追加配送员
 * 可追加的配送员需符合以下条件:
 * 1. 配送员在1小时内接过此商户的订单,且订单未完成
 * 2. 配送员在当前商户接单数小于系统限定的指定商户接单总数
 * 3. 配送员在达达平台的接单数量未达上限
 * Class AppendTransporter
 * @package youlong\api
 */
class AppendTransporter extends Base
{
    public $shop_no; // 门店编码
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_APPOINT_LIST_TRANSPORTER_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 门店编码
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