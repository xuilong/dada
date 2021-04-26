<?php
namespace youlong\api\order;

use youlong\config\UrlConfig;

/**
 * 新增订单
 * Class AddOrder
 * @package youlong\api
 */
class AddOrder extends BaseOrder
{
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::ORDER_ADD_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }
}