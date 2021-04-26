<?php
namespace youlong\api\merchant;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 注册商户
 * 商户注册接口,并完成与该商户的绑定.生成的初始化密码会以短信形式发送给注册手机号
 * 注：调用该接口签名中source_id参数需传空字符串
 * Class MerchantAdd
 * @package youlong\api\merchant
 */
class MerchantAdd extends Base
{
    public $mobile; // 注册商户手机号,用于登陆商户后台
    public $city_name; // 商户城市名称(如,上海)
    public $enterprise_name; // 企业全称
    public $enterprise_address; // 企业地址
    public $contact_name; // 联系人姓名
    public $contact_phone; // 联系人电话
    public $email; // 邮箱地址
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::MERCHANTAPI_MERCHANT_ADD_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 注册商户手机号,用于登陆商户后台
     * @param $mobile
     */
    public function setMobile($mobile)
    {
        !empty($mobile) ? $this->mobile = $mobile : self::error('mobile');
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * 商户城市名称(如,上海)
     * @param $city_name
     */
    public function setCityName($city_name)
    {
        !empty($city_name) ? $this->city_name = $city_name : self::error('city_name');
    }

    public function getCityName($city_name)
    {
        return $this->city_name;
    }

    /**
     * 企业全称
     * @param $enterprise_name
     */
    public function setEnterpriseName($enterprise_name)
    {
        !empty($enterprise_name) ? $this->enterprise_name = $enterprise_name : self::error('enterprise_name');
    }

    public function getEnterpriseName()
    {
        return $this->enterprise_name;
    }

    /**
     * 企业地址
     * @param $enterprise_address
     */
    public function setEnterpriseDddress($enterprise_address)
    {
        !empty($enterprise_address) ? $this->enterprise_address = $enterprise_address : self::error('enterprise_address');
    }

    public function getEnterpriseDddress()
    {
        return $this->enterprise_address;
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
     * @param $contact_phone
     */
    public function setContactPhone($contact_phone)
    {
        !empty($contact_phone) ? $this->contact_phone = $contact_phone : self::error('contact_phone');
    }

    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * 邮箱地址
     * @param $email
     */
    public function setEmail($email)
    {
        !empty($email) ? $this->email = $email : self::error('email');
    }

    public function getEmail()
    {
        return $this->email;
    }
}