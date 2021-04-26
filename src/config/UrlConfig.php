<?php
namespace youlong\config;
class UrlConfig{

    const ORDER_ADD_URL = "/api/order/addOrder"; // 新增配送单接口

    const ORDER_READD_URL = "/api/order/reAddOrder"; // 重新发布订单

    const ORDER_FORMAL_CANCEL_URL = "/api/order/formalCancel"; // 取消订单

    const ORDER_QUERY_URL = "/api/order/status/query"; // 订单详情查询

    const ORDER_CONFIRM_GOODS_URL = "/api/order/confirm/goods"; // 妥投异常之物品返回完成

    const SHOP_ADD_URL = "/api/shop/add"; // 新增门店

    const SHOP_UPDATE_URL = "/api/shop/update"; // 更新门店

    const SHOP_DETAIL_URL = "/api/shop/detail"; // 门店详情

    const CITY_CODE_LIST_URL = "/api/cityCode/list"; // 获取城市信息

    const ORDER_ACCEPT_URL = "/api/order/accept"; // 接受订单(模拟)

    const ORDER_APPOINT_LIST_TRANSPORTER_URL = "/api/order/appoint/list/transporter"; // 查询追加配送员

    const ORDER_ADDTIP_URL= "/api/order/addTip"; // 增加小费

    const ORDER_CANCEL_REASONS_URL = "/api/order/cancel/reasons"; // 获取取消原因

    const ORDER_APPOINT_EXIST_URL = "/api/order/appoint/exist"; // 追加订单

    const ORDER_APPOINT_CANCEL_URL = "/api/order/appoint/cancel"; // 取消追加订单

    const COMPLAINT_DADA_URL = "/api/complaint/dada"; // 商家投诉达达

    const COMPLAINT_REASONS_URL = "/api/complaint/reasons"; // 获取商家投诉达达原因

    const MERCHANTAPI_MERCHANT_ADD_URL = "/merchantApi/merchant/add"; // 注册商户

    const MESSAGE_CONFIRM_URL = "/api/message/confirm"; // 消息确认

    const RECHARGE_URL = "/api/recharge"; // 获取充值链接
    const BALANCE_QUERY_URL = "/api/balance/query"; // 查询账户余额

}