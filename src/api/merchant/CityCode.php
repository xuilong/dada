<?php
namespace youlong\api\merchant;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 获取城市信息
 * 注：当没有业务参数的时候, body需要赋值为空字符串,即body:""。
 * Class CityCode
 * @package youlong\api\merchant
 */
class CityCode extends Base
{
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::CITY_CODE_LIST_URL;
    }
    public function getUrl()
    {
        return $this->url;
    }
}