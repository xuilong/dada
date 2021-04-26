<?php
namespace youlong\api\recharge;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 查询账户余额
 * Class BalanceQuery
 * @package youlong\api\recharge
 */
class BalanceQuery extends Base
{
    public $category;   // 查询运费账户类型（1：运费账户；2：红包账户，3：所有），默认查询运费账户余额
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::BALANCE_QUERY_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 查询运费账户类型（1：运费账户；2：红包账户，3：所有），默认查询运费账户余额
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
}