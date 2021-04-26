<?php
namespace youlong\api\order;


use youlong\api\Base;

class BaseOrder extends Base
{
    public $shop_no; // 门店编号
    public $origin_id; // 第三方订单ID
    public $city_code; // 订单所在城市的code
    public $cargo_price; // 订单金额（单位：元）
    public $is_prepay; // 是否需要垫付 1:是 0:否 (垫付订单金额，非运费)
    public $receiver_name; // 收货人姓名
    public $receiver_address; //
    public $receiver_lat; // 收货人地址纬度
    public $receiver_lng; // 收货人地址经度
    public $callback; // 回调URL
    public $cargo_weight; // 订单重量（单位：Kg）
    public $receiver_phone; // 收货人手机号


    /**
     * 门店编号，门店创建后可在门店列表和单页查看
     * @param $shopNo
     */
    public function setShopNo($shopNo)
    {
        !empty($shopNo) ? $this->shop_no = $shopNo : self::error('shop_no');
    }

    public function getShopNo()
    {
        return $this->shop_no;
    }

    /**
     * 第三方订单ID
     * @param $originId
     */
    public function setOriginId($originId)
    {
        !empty($originId) ? $this->origin_id = $originId : self::error('origin_id');
    }

    public function getOriginId()
    {
        return $this->origin_id;
    }

    /**
     * 订单所在城市的code
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
     * 订单金额（单位：元）
     * @param $cargo_price
     */
    public function setCargoPrice($cargo_price)
    {
        !empty($cargo_price) ? $this->cargo_price = $cargo_price : self::error('cargo_price');
    }

    public function getCargoPrice()
    {
        return $this->cargo_price;
    }

    /**
     * 是否需要垫付 1:是 0:否 (垫付订单金额，非运费)
     * @param $is_prepay
     */
    public function setIsPrepay($is_prepay)
    {
        isset($is_prepay) ? $this->is_prepay = $is_prepay : self::error('is_prepay');
    }

    public function getIsPrepay()
    {
        return $this->is_prepay;
    }

    /**
     * 收货人姓名
     * @param $receiver_name
     */
    public function setReceiverName($receiver_name)
    {
        !empty($receiver_name) ? $this->receiver_name = $receiver_name : self::error('receiver_name');
    }

    public function getReceiverName()
    {
        return $this->receiver_name;
    }

    /**
     * 收货人地址
     * @param $receiver_address
     */
    public function setReceiverDddress($receiver_address)
    {
        !empty($receiver_address) ? $this->receiver_address = $receiver_address : self::error('receiver_address');
    }

    public function getReceiverDddress()
    {
        return $this->receiver_address;
    }

    /**
     * 收货人地址纬度
     * @param $receiver_lat
     */
    public function setReceiverLat($receiver_lat)
    {
        isset($receiver_lat) ? $this->receiver_lat = $receiver_lat : self::error('receiver_lat');
    }

    public function getReceiverLat()
    {
        return $this->receiver_lat;
    }

    /**
     * 收货人地址经度
     * @param $receiver_lng
     */
    public function setReceiverLng($receiver_lng)
    {
        isset($receiver_lng) ? $this->receiver_lng = $receiver_lng : self::error('receiver_lng');
    }

    public function getReceiverLng()
    {
        return $this->receiver_lng;
    }

    /**
     * 回调URL（查看回调说明）
     * https://newopen.imdada.cn/#/development/file/order?_k=vnuemo
     * @param $callback
     */
    public function setCallback($callback)
    {
        !empty($callback) ? $this->callback = $callback : self::error('callback');
    }

    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * 订单重量（单位：Kg）
     * @param $cargo_weight
     */
    public function setCargoWeight($cargo_weight)
    {
        is_numeric($cargo_weight) ? $this->cargo_weight = $cargo_weight : self::error('cargo_weight');
    }

    public function getCargoWeight()
    {
        return $this->cargo_weight;
    }

    /**
     * 收货人手机号（手机号和座机号必填一项）
     * @param $receiver_phone
     */
    public function setReceiverPhone($receiver_phone)
    {
        !empty($receiver_phone) ? $this->receiver_phone = $receiver_phone : self::error('receiver_phone');
    }

    public function getReceiverPhone()
    {
        return $this->receiver_phone;
    }

    /**
     * 收货人座机号（手机号和座机号必填一项）
     * @param $receiver_tel
     */
    public function setReceiverTel($receiver_tel)
    {
        !empty($receiver_tel) ? $this->receiver_tel = $receiver_tel : self::error('receiver_tel');
    }

    public function getReceiverTel()
    {
        return $this->receiver_tel;
    }

    /**
     * 小费（单位：元，精确小数点后一位）
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
     * 订单备注
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

    /**
     * 订单商品类型：
     *    食品小吃-1,饮料-2,鲜花-3,文印票务-8,便利店-9,水果生鲜-13,
     *    同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,服装-26,
     *    汽修零配-27,数码-28,小龙虾-29,火锅-51,其他-5
     * @param $cargo_type
     */
    public function setCargoType($cargo_type)
    {
        !empty($cargo_type) ? $this->cargo_type = $cargo_type : self::error('cargo_type');
    }

    public function getCargoType()
    {
        return $this->cargo_type;
    }

    /**
     * 订单商品数量
     * @param $cargo_num
     */
    public function setCargoNum($cargo_num)
    {
        !empty($cargo_num) ? $this->cargo_num = $cargo_num : self::error('cargo_num');
    }

    public function getCargoNum()
    {
        return $this->cargo_num;
    }

    /**
     * 发票抬头
     * @param $invoice_title
     */
    public function setInvoiceTitle($invoice_title)
    {
        !empty($invoice_title) ? $this->invoice_title = $invoice_title : self::error('invoice_title');
    }

    public function getInvoiceTitle()
    {
        return $this->invoice_title;
    }

    /**
     * 订单来源标示（只支持字母，最大长度为10）
     * @param $origin_mark
     */
    public function setOriginMark($origin_mark)
    {
        !empty($origin_mark) ? $this->origin_mark = $origin_mark : self::error('origin_mark');
    }

    public function getOriginMark()
    {
        return $this->origin_mark;
    }

    /**
     * 订单来源编号，最大长度为30，该字段可以显示在骑士APP订单详情页面，示例：
     * origin_mark_no:"#京东到家#1"
     * 达达骑士APP看到的是：#京东到家#1
     * @param $origin_mark_no
     */
    public function setOriginMarkNo($origin_mark_no)
    {
        !empty($origin_mark_no) ? $this->origin_mark_no = $origin_mark_no : self::error('origin_mark_no');
    }

    public function getOriginMarkNo()
    {
        return $this->origin_mark_no;
    }

    /**
     * 是否使用保价费（0：不使用保价，1：使用保价； 同时，请确保填写了订单金额（cargo_price））
     * 商品保价费(当商品出现损坏，可获取一定金额的赔付)
     * 保费=配送物品实际价值*费率（5‰），配送物品价值及最高赔付不超过10000元，
     * 最高保费为50元（物品价格最小单位为100元，不足100元部分按100元认定，保价费向上取整数， 如：物品声明价值为201元，保价费为300元*5‰=1.5元，取整数为2元。）
     * 若您选择不保价，若物品出现丢失或损毁，最高可获得平台30元优惠券。 （优惠券直接存入用户账户中）。
     * @param $is_use_insurance
     */
    public function setIsUseInsurance($is_use_insurance)
    {
        !empty($is_use_insurance) ? $this->is_use_insurance = $is_use_insurance : self::error('is_use_insurance');
    }

    public function getIsUseInsurance()
    {
        return $this->is_use_insurance;
    }

    /**
     * 收货码（0：不需要；1：需要。收货码的作用是：骑手必须输入收货码才能完成订单妥投）
     * @param $is_finish_code_needed
     */
    public function setIsFinishCodeNeeded($is_finish_code_needed)
    {
        !empty($is_finish_code_needed) ? $this->is_finish_code_needed = $is_finish_code_needed : self::error('is_finish_code_needed');
    }

    public function getIsFinishCodeNeeded()
    {
        return $this->is_finish_code_needed;
    }

    /**
     * 预约发单时间（预约时间unix时间戳(10位),精确到分;整分钟为间隔，并且需要至少提前5分钟预约，可以支持未来3天内的订单发预约单。）
     * @param $delay_publish_time
     */
    public function setDelayPublishTime($delay_publish_time)
    {
        !empty($delay_publish_time) ? $this->delay_publish_time = $delay_publish_time : self::error('delay_publish_time');
    }

    public function getDelayPublishTime()
    {
        return $this->delay_publish_time;
    }

    /**
     * 是否选择直拿直送（0：不需要；1：需要。选择直拿直送后，同一时间骑士只能配送此订单至完成，同时，也会相应的增加配送费用）
     * @param $is_direct_delivery
     */
    public function setIsDirectDelivery($is_direct_delivery)
    {
        !empty($is_direct_delivery) ? $this->is_direct_delivery = $is_direct_delivery : self::error('is_direct_delivery');
    }

    public function getIsDirectDelivery()
    {
        return $this->is_direct_delivery;
    }

    /**
     * 订单商品明细
     * @param $product_list
     */
    public function setProductList($product_list)
    {
        !empty($product_list) ? $this->product_list = $product_list : self::error('product_list');
    }

    public function getProductList()
    {
        return $this->product_list;
    }

    /**
     * 货架信息,该字段可在骑士APP订单备注中展示
     * @param $pick_up_pos
     */
    public function setPickUpPos($pick_up_pos)
    {
        !empty($pick_up_pos) ? $this->pick_up_pos = $pick_up_pos : self::error('pick_up_pos');
    }

    public function getPickUpPos()
    {
        return $this->pick_up_pos;
    }
}