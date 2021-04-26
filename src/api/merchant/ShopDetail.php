<?php
namespace youlong\api\merchant;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 门店详情
 * Class ShopDetail
 * @package youlong\api\merchant
 */
class ShopDetail extends Base
{
    public $origin_shop_id;
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::SHOP_DETAIL_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 门店编码
     * @param $origin_shop_id
     */
    public function setOriginShopId($origin_shop_id)
    {
        !empty($origin_shop_id) ? $this->origin_shop_id = $origin_shop_id : self::error('origin_shop_id');
    }

    public function getOriginShopId()
    {
        return $this->origin_shop_id;
    }
}