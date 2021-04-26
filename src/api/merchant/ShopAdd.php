<?php
namespace youlong\api\merchant;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 新增门店
 * 1. 门店编码可自定义，但必须唯一，若不填写，则系统自动生成。发单时用于确认发单门店
 * 2. 如果需要使用达达商家App发单，请设置登陆达达商家App的账号（必须手机号）和密码
 * 3. 该接口为批量接口,业务参数为数组
 * Class ShopAdd
 * @package youlong\api\merchant
 */
class ShopAdd extends Base
{
    public $station_name;       // 门店名称
    public $business;           // 业务类型
    public $city_name;          // 城市名称(如,上海)
    public $area_name;          // 区域名称(如,浦东新区)
    public $station_address;    // 门店地址
    public $lng;                // 门店经度
    public $lat;                // 门店纬度
    public $contact_name;       // 联系人姓名
    public $phone;              // 联系人电话
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::SHOP_ADD_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 门店名称
     * @param $station_name
     */
    public function setStationName($station_name)
    {
        !empty($station_name) ? $this->station_name = $station_name : self::error('station_name');
    }

    public function getStationName()
    {
        return $this->station_name;
    }

    /**
     * 业务类型
     * (食品小吃-1,饮料-2,鲜花-3,文印票务-8,便利店-9,水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,
     * 酒品-24,小商品市场-25,服装-26,汽修零配-27,数码-28,小龙虾-29,火锅-51,其他-5)
     * @param $business
     */
    public function setBusiness($business)
    {
        !empty($business) ? $this->business = $business : self::error('business');
    }

    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * 城市名称(如,上海)
     * @param $city_name
     */
    public function setCityName($city_name)
    {
        !empty($city_name) ? $this->city_name = $city_name : self::error('city_name');
    }

    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * 区域名称(如,浦东新区)
     * @param $area_name
     */
    public function setAreaName($area_name)
    {
        !empty($area_name) ? $this->area_name = $area_name : self::error('area_name');
    }

    public function getAreaName()
    {
        return $this->area_name;
    }

    /**
     * 门店地址
     * @param $station_address
     */
    public function setStationAddress($station_address)
    {
        !empty($station_address) ? $this->station_address = $station_address : self::error('station_address');
    }

    public function getStationAddress()
    {
        return $this->station_address;
    }

    /**
     * 门店经度
     * @param $lng
     */
    public function setLng($lng)
    {
        !empty($lng) ? $this->lng = $lng : self::error('lng');
    }

    public function getLng()
    {
        return $this->lng;
    }

    /**
     * 门店纬度
     * @param $lat
     */
    public function setLat($lat)
    {
        !empty($lat) ? $this->lat = $lat : self::error('lat');
    }

    public function getLat()
    {
        return $this->lat;
    }

    /**
     * 联系人姓名
     * @param $contact_name
     */
    public function setContactName($contact_name)
    {
        !empty($contact_name) ? $this->contact_name = $contact_name : self::error('contact_name');
    }

    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * 联系人电话
     * @param $phone
     */
    public function setPhone($phone)
    {
        !empty($phone) ? $this->phone = $phone : self::error('phone');
    }

    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * 门店编码,可自定义,但必须唯一;若不填写,则系统自动生成
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

    /**
     * 联系人身份证
     * @param $id_card
     */
    public function setIdCard($id_card)
    {
        !empty($id_card) ? $this->id_card = $id_card : self::error('id_card');
    }

    public function getIdCard()
    {
        return $this->id_card;
    }

    /**
     * 达达商家app账号(若不需要登陆app,则不用设置)
     * @param $username
     */
    public function setUsername($username)
    {
        !empty($username) ? $this->username = $username : self::error('username');
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * 达达商家app密码(若不需要登陆app,则不用设置)
     * @param $password
     */
    public function setPassword($password)
    {
        !empty($password) ? $this->password = $password : self::error('password');
    }

    public function getPassword()
    {
        return $this->password;
    }
}