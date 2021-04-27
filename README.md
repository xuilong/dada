达达配送--接口说明文档

​       首页感谢达达配送官方提供的`SDK`，本`composer`包基于达达配送官方`SDK`修改而来。本软件/插件包只作为学习使用，如果需要商业使用需要根据自己业务需求修改。

官方链接：https://newopen.imdada.cn/

个人链接：http://www.youlongit.com

注意：

需要在项目根目录下config目录下新建dada.php文件，内容如下所示：

```php
<?php
return[
    'app_key'   => '',
    'app_secret'   => '',
    'v'   => '1.0',
    'source_id'   => '',
    'host'   => 'http://newopen.qa.imdada.cn',
];
```

目录结构如下：

```
youlong
--dada
----src
------api
--------merchant
----------CityCode.php
----------MerchantAdd.php
----------ShopAdd.php
----------ShopDetail.php
----------ShopUpdate.php
--------message_inform
----------MessageInform.php
--------order
----------AddOrder.php
----------AddTip.php
----------AppendOrder.php
----------AppendTransporter.php
----------BaseOrder.php
----------CancelAppendOrder.php
----------CancelOrder.php
----------CancelReasons.php
----------ComplaintDada.php
----------ComplaintReasons.php
----------ConfirmAbnormalGoods.php
----------OrderDetails.php
----------ReAddOrder.php
--------recharge
----------BalanceQuery.php
----------Recharge.php
--------Base.php
--------client
----------DadaRequestClient.php
----------DadaResponse.php
--------config
----------Config.php
----------UrlConfig.php
------Dada.php
------composer.json
```

## 1、订单管理

### 1.1、新增订单

#### 1.1.1、接口简介

在测试环境，使用统一商户和门店进行发单。其中，商户id：73753，门店编号：11047059

#### 1.1.2、请求参数说明

| 名称                  | 类型    | 是否必传 | 描述                                                         |
| --------------------- | ------- | -------- | ------------------------------------------------------------ |
| shop_no               | String  | 是       | 门店编号，门店创建后可在门店列表和单页查看                   |
| origin_id             | String  | 是       | 第三方订单ID                                                 |
| city_code             | String  | 是       | 订单所在城市的code（[查看各城市对应的code值](https://newopen.imdada.cn/#/development/file/cityList)） |
| cargo_price           | Double  | 是       | 订单金额（单位：元）                                         |
| is_prepay             | Integer | 是       | 是否需要垫付 1:是 0:否 (垫付订单金额，非运费)                |
| receiver_name         | String  | 是       | 收货人姓名                                                   |
| receiver_address      | String  | 是       | 收货人地址                                                   |
| receiver_lat          | Double  | 是       | 收货人地址纬度                                               |
| receiver_lng          | Double  | 是       | 收货人地址经度                                               |
| callback              | String  | 是       | 回调URL（[查看回调说明](https://newopen.imdada.cn/#/development/file/order)） |
| cargo_weight          | Double  | 是       | 订单重量（单位：Kg）                                         |
| receiver_phone        | String  | 否       | 收货人手机号（手机号和座机号必填一项）                       |
| receiver_phone        | String  | 否       | 收货人座机号（手机号和座机号必填一项）                       |
| tips                  | Double  | 否       | 小费（单位：元，精确小数点后一位）                           |
| info                  | String  | 否       | 订单备注                                                     |
| cargo_type            | Integer | 否       | 订单商品类型：食品小吃-1,饮料-2,鲜花-3,文印票务-8,便利店-9,水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,服装-26,汽修零配-27,数码-28,小龙虾-29,火锅-51,其他-5 |
| cargo_num             | Integer | 否       | 订单商品数量                                                 |
| invoice_title         | String  | 否       | 发票抬头                                                     |
| origin_mark           | String  | 否       | 订单来源标示（只支持字母，最大长度为10）                     |
| origin_mark_no        | String  | 否       | 订单来源编号，最大长度为30，该字段可以显示在骑士APP订单详情页面，示例：<br/>origin_mark_no:"#京东到家#1"<br/>达达骑士APP看到的是：#京东到家#1 |
| is_use_insurance      | Integer | 否       | 是否使用保价费（0：不使用保价，1：使用保价； 同时，请确保填写了订单金额（cargo_price）） |
| is_finish_code_needed | Integer | 否       | 收货码（0：不需要；1：需要。收货码的作用是：骑手必须输入收货码才能完成订单妥投） |
| delay_publish_time    | Integer | 否       | 预约发单时间（预约时间unix时间戳(10位),精确到分;整分钟为间隔，并且需要至少提前5分钟预约，可以支持未来3天内的订单发预约单。） |
| is_direct_delivery    | Integer | 否       | 是否选择直拿直送（0：不需要；1：需要。选择直拿直送后，同一时间骑士只能配送此订单至完成，同时，也会相应的增加配送费用） |
| product_list          | Object  | 否       | 订单商品明细                                                 |
| pick_up_pos           | String  | 否       | 货架信息,该字段可在骑士APP订单备注中展示                     |

##### 1.1.2.1、product_list请求参数

| 名称           | 类型   | 是否必传 | 描述                         |
| -------------- | ------ | -------- | ---------------------------- |
| sku_name       | String | 是       | 商品名称，限制长度128        |
| src_product_no | String | 是       | 商品编码，限制长度64         |
| count          | Double | 是       | 商品数量，精确到小数点后两位 |
| unit           | String | 否       | 商品单位，默认：件           |

#### 1.1.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

| 参数名称     | 类型   | 是否必须 | 描述                                   |
| ------------ | ------ | -------- | -------------------------------------- |
| distance     | Double | 是       | 配送距离(单位：米)                     |
| fee          | Double | 是       | 实际运费(单位：元)，运费减去优惠券费用 |
| deliverFee   | Double | 是       | 运费(单位：元)                         |
| couponFee    | Double | 否       | 优惠券费用(单位：元)                   |
| tips         | Double | 否       | 小费(单位：元)                         |
| insuranceFee | Double | 否       | 保价费(单位：元)                       |

正确的返回结果如下：

```php
[
  "status"	=> "success",
  "code"	=> 0,
  "msg"		=> "成功",
  "result"	=> [
    "distance"		=> 1762904.8573641,
    "fee"			=> 12,
    "deliverFee"	=> 12,
    "insuranceFee"	=> 0,
    "tips"			=> 0,
  }
]
```

#### 1.1.4、请求案例

```php
<?php
    $data = new Dada();
    $addOrder = new AddOrder();
    $addOrder->setShopNo('11047059');
    $addOrder->setOriginId('20210416111032767383');
    $addOrder->setCityCode('2068');
    $addOrder->setCargoPrice(10.00);
    $addOrder->setIsPrepay(0);
    $addOrder->setReceiverName('测试');
    $addOrder->setReceiverPhone(13800138000);
    $addOrder->setReceiverDddress('中山市');
    $addOrder->setReceiverLat(22.51595);
    $addOrder->setReceiverLng(113.3926);
    $addOrder->setCargoWeight(5);
    $addOrder->setCargoNum(1);
    $addOrder->setCallback('http://krqx86.natappfree.cc/business.php?r=business/place/order');
    $req = new DadaRequestClient($data, $addOrder);
    var_dump($req->makeRequest());
```

### 1.2、重新发布订单

#### 1.2.1、接口简介

在调用[新增订单](https://newopen.imdada.cn/#/development/file/add)后，订单被取消、投递异常（妥投异常之物品返回完成=10）的情况下，调用此接口，可以在达达平台重新发布订单。

#### 1.2.2、请求参数

| 名称                  | 类型    | 是否必传 | 描述                                                         |
| --------------------- | ------- | -------- | ------------------------------------------------------------ |
| shop_no               | String  | 是       | 门店编号，门店创建后可在门店列表和单页查看                   |
| origin_id             | String  | 是       | 第三方订单ID                                                 |
| city_code             | String  | 是       | 订单所在城市的code（[查看各城市对应的code值](https://newopen.imdada.cn/#/development/file/cityList)） |
| cargo_price           | Double  | 是       | 订单金额（单位：元）                                         |
| is_prepay             | Integer | 是       | 是否需要垫付 1:是 0:否 (垫付订单金额，非运费)                |
| receiver_name         | String  | 是       | 收货人姓名                                                   |
| receiver_address      | String  | 是       | 收货人地址                                                   |
| receiver_lat          | Double  | 是       | 收货人地址纬度                                               |
| receiver_lng          | Double  | 是       | 收货人地址经度                                               |
| callback              | String  | 是       | 回调URL（[查看回调说明](https://newopen.imdada.cn/#/development/file/order)） |
| cargo_weight          | Double  | 是       | 订单重量（单位：Kg）                                         |
| receiver_phone        | String  | 否       | 收货人手机号（手机号和座机号必填一项）                       |
| receiver_phone        | String  | 否       | 收货人座机号（手机号和座机号必填一项）                       |
| tips                  | Double  | 否       | 小费（单位：元，精确小数点后一位）                           |
| info                  | String  | 否       | 订单备注                                                     |
| cargo_type            | Integer | 否       | 订单商品类型：食品小吃-1,饮料-2,鲜花-3,文印票务-8,便利店-9,水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,服装-26,汽修零配-27,数码-28,小龙虾-29,火锅-51,其他-5 |
| cargo_num             | Integer | 否       | 订单商品数量                                                 |
| invoice_title         | String  | 否       | 发票抬头                                                     |
| origin_mark           | String  | 否       | 订单来源标示（只支持字母，最大长度为10）                     |
| origin_mark_no        | String  | 否       | 订单来源编号，最大长度为30，该字段可以显示在骑士APP订单详情页面，示例：<br/>origin_mark_no:"#京东到家#1"<br/>达达骑士APP看到的是：#京东到家#1 |
| is_use_insurance      | Integer | 否       | 是否使用保价费（0：不使用保价，1：使用保价； 同时，请确保填写了订单金额（cargo_price）） |
| is_finish_code_needed | Integer | 否       | 收货码（0：不需要；1：需要。收货码的作用是：骑手必须输入收货码才能完成订单妥投） |
| delay_publish_time    | Integer | 否       | 预约发单时间（预约时间unix时间戳(10位),精确到分;整分钟为间隔，并且需要至少提前5分钟预约，可以支持未来3天内的订单发预约单。） |
| is_direct_delivery    | Integer | 否       | 是否选择直拿直送（0：不需要；1：需要。选择直拿直送后，同一时间骑士只能配送此订单至完成，同时，也会相应的增加配送费用） |
| product_list          | Object  | 否       | 订单商品明细                                                 |
| pick_up_pos           | String  | 否       | 货架信息,该字段可在骑士APP订单备注中展示                     |

##### 1.2.2.1、product_list请求参数

| 名称           | 类型   | 是否必传 | 描述                         |
| -------------- | ------ | -------- | ---------------------------- |
| sku_name       | String | 是       | 商品名称，限制长度128        |
| src_product_no | String | 是       | 商品编码，限制长度64         |
| count          | Double | 是       | 商品数量，精确到小数点后两位 |
| unit           | String | 否       | 商品单位，默认：件           |

#### 1.2.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

| 参数名称     | 类型   | 是否必须 | 描述                                   |
| ------------ | ------ | -------- | -------------------------------------- |
| distance     | Double | 是       | 配送距离(单位：米)                     |
| fee          | Double | 是       | 实际运费(单位：元)，运费减去优惠券费用 |
| deliverFee   | Double | 是       | 运费(单位：元)                         |
| couponFee    | Double | 否       | 优惠券费用(单位：元)                   |
| tips         | Double | 否       | 小费(单位：元)                         |
| insuranceFee | Double | 否       | 保价费(单位：元)                       |

正确的返回结果如下：

```php
[
  "status"	=> "success",
  "code"	=> 0,
  "msg"		=> "成功",
  "result"	=> [
    "distance"		=> 1762904.8573641,
    "fee"			=> 12,
    "deliverFee"	=> 12,
    "insuranceFee"	=> 0,
    "tips"			=> 0,
  }
]
```

#### 1.2.4、请求案例

```php
<?php
    $data = new Dada();
    $addOrder = new ReAddOrder();
    $addOrder->setShopNo('11047059');
    $addOrder->setOriginId('20210416111032767383');
    $addOrder->setCityCode('2068');
    $addOrder->setCargoPrice(10.00);
    $addOrder->setIsPrepay(0);
    $addOrder->setReceiverName('测试');
    $addOrder->setReceiverPhone(13800138000);
    $addOrder->setReceiverDddress('中山市');
    $addOrder->setReceiverLat(22.51595);
    $addOrder->setReceiverLng(113.3926);
    $addOrder->setCargoWeight(5);
    $addOrder->setCargoNum(1);
    $addOrder->setCallback('http://krqx86.natappfree.cc/business.php?r=business/place/order');
    $req = new DadaRequestClient($data, $addOrder);
    var_dump($req->makeRequest());
```

### 1.3、订单预发布

#### 1.3.1、接口简介

预发布订单的操作流程是：使用【查询订单运费接口】获取平台订单编号，调用【查询运费后发单接口】即可发布订单。

【查询订单运费接口】经纬度为非必传参数，如果不传经纬度，系统会自动在city_code所在城市解析收货地址，所以此时接口中的city_code一定要传正确。

#### 1.3.2、查询订单运费接口

传入订单相关参数可以查询到该时刻订单所需的运费，同时返回一个唯一的平台订单编号，注意：该平台订单编号有效期为3分钟。

##### 1.3.2.1、请求参数说明

| 名称                  | 类型    | 是否必传 | 描述                                                         |
| --------------------- | ------- | -------- | ------------------------------------------------------------ |
| shop_no               | String  | 是       | 门店编号，门店创建后可在门店列表和单页查看                   |
| origin_id             | String  | 是       | 第三方订单ID                                                 |
| city_code             | String  | 是       | 订单所在城市的code（[查看各城市对应的code值](https://newopen.imdada.cn/#/development/file/cityList)） |
| cargo_price           | Double  | 是       | 订单金额（单位：元）                                         |
| is_prepay             | Integer | 是       | 是否需要垫付 1:是 0:否 (垫付订单金额，非运费)                |
| receiver_name         | String  | 是       | 收货人姓名                                                   |
| receiver_address      | String  | 是       | 收货人地址                                                   |
| receiver_lat          | Double  | 是       | 收货人地址纬度                                               |
| receiver_lng          | Double  | 是       | 收货人地址经度                                               |
| callback              | String  | 是       | 回调URL（[查看回调说明](https://newopen.imdada.cn/#/development/file/order)） |
| cargo_weight          | Double  | 是       | 订单重量（单位：Kg）                                         |
| receiver_phone        | String  | 否       | 收货人手机号（手机号和座机号必填一项）                       |
| receiver_phone        | String  | 否       | 收货人座机号（手机号和座机号必填一项）                       |
| tips                  | Double  | 否       | 小费（单位：元，精确小数点后一位）                           |
| info                  | String  | 否       | 订单备注                                                     |
| cargo_type            | Integer | 否       | 订单商品类型：食品小吃-1,饮料-2,鲜花-3,文印票务-8,便利店-9,水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,服装-26,汽修零配-27,数码-28,小龙虾-29,火锅-51,其他-5 |
| cargo_num             | Integer | 否       | 订单商品数量                                                 |
| invoice_title         | String  | 否       | 发票抬头                                                     |
| origin_mark           | String  | 否       | 订单来源标示（只支持字母，最大长度为10）                     |
| origin_mark_no        | String  | 否       | 订单来源编号，最大长度为30，该字段可以显示在骑士APP订单详情页面，示例：<br/>origin_mark_no:"#京东到家#1"<br/>达达骑士APP看到的是：#京东到家#1 |
| is_use_insurance      | Integer | 否       | 是否使用保价费（0：不使用保价，1：使用保价； 同时，请确保填写了订单金额（cargo_price）） |
| is_finish_code_needed | Integer | 否       | 收货码（0：不需要；1：需要。收货码的作用是：骑手必须输入收货码才能完成订单妥投） |
| delay_publish_time    | Integer | 否       | 预约发单时间（预约时间unix时间戳(10位),精确到分;整分钟为间隔，并且需要至少提前5分钟预约，可以支持未来3天内的订单发预约单。） |
| is_direct_delivery    | Integer | 否       | 是否选择直拿直送（0：不需要；1：需要。选择直拿直送后，同一时间骑士只能配送此订单至完成，同时，也会相应的增加配送费用） |
| product_list          | Object  | 否       | 订单商品明细                                                 |
| pick_up_pos           | String  | 否       | 货架信息,该字段可在骑士APP订单备注中展示                     |

##### 1.3.2.2、product_list请求参数

| 名称           | 类型   | 是否必传 | 描述                         |
| -------------- | ------ | -------- | ---------------------------- |
| sku_name       | String | 是       | 商品名称，限制长度128        |
| src_product_no | String | 是       | 商品编码，限制长度64         |
| count          | Double | 是       | 商品数量，精确到小数点后两位 |
| unit           | String | 否       | 商品单位，默认：件           |

##### 1.3.2.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

| 参数名称     | 类型   | 是否必须 | 描述                                   |
| ------------ | ------ | -------- | -------------------------------------- |
| distance     | Double | 是       | 配送距离(单位：米)                     |
| deliveryNo   | String | 是       | 平台订单号                             |
| fee          | Double | 是       | 实际运费(单位：元)，运费减去优惠券费用 |
| deliverFee   | Double | 是       | 运费(单位：元)                         |
| couponFee    | Double | 否       | 优惠券费用(单位：元)                   |
| tips         | Double | 否       | 小费(单位：元)                         |
| insuranceFee | Double | 否       | 保价费(单位：元)                       |

正确的返回结果如下：

```php
[
  "status"	=> "success",
  "code"	=> 0,
  "msg"		=> "成功",
  "result"	=> [
    "distance"		=> 1762904.8573641,
    "fee"			=> 12,
    "deliverFee"	=> 12,
    "insuranceFee"	=> 0,
    "tips"			=> 0,
  }
]
```

#### 1.3.3、查询运费后发单接口

根据【查询订单运费接口】返回的平台订单编号进行发单。只有新订单或者状态为已取消、已过期以及投递异常的情况下可以进行订单预发布。

##### 1.3.3.1、请求参数说明

| 名称       | 类型   | 是否必传 | 描述         |
| ---------- | ------ | -------- | ------------ |
| deliveryNo | String | 是       | 平台订单编号 |

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

| 参数名称     | 类型   | 是否必须 | 描述                                   |
| ------------ | ------ | -------- | -------------------------------------- |
| distance     | Double | 是       | 配送距离(单位：米)                     |
| deliveryNo   | String | 是       | 平台订单号                             |
| fee          | Double | 是       | 实际运费(单位：元)，运费减去优惠券费用 |
| deliverFee   | Double | 是       | 运费(单位：元)                         |
| couponFee    | Double | 否       | 优惠券费用(单位：元)                   |
| tips         | Double | 否       | 小费(单位：元)                         |
| insuranceFee | Double | 否       | 保价费(单位：元)                       |

正确的返回结果如下：

```php

```

#### 1.3.4、请求案例

```php

```

### 1.4、增加小费

#### 1.4.1、接口简介

可以对待接单状态的订单增加小费。需要注意：订单的小费，以最新一次加小费动作的金额为准，故下一次增加小费额必须大于上一次小费额。

#### 1.4.2、请求参数说明

| 名称      | 类型   | 是否必传 | 描述                                   |
| --------- | ------ | -------- | -------------------------------------- |
| order_id  | String | 是       | 第三方订单编号                         |
| tips      | float  | 是       | 小费金额(精确到小数点后一位，单位：元) |
| city_code | String | 是       | 订单城市区号                           |
| info      | String | 否       | 备注(字段最大长度：512)                |

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

#### 1.4.3、请求案例

```php
<?php
    $data = new Dada();
    $addTip = new AddTip();
    $addTip->setOrderId('20210416111032767383');
    $addTip->setCityCode('2068');
    $addTip->setTips(1.5);
    $req = new DadaRequestClient($data, $addTip);
    var_dump($req->makeRequest());
```

### 1.5、订单回调

#### 1.5.1、接口简介

每次订单状态发生变化时，会对添加订单接口中callback的URL进行回调。

1. 已取消：包括配送员取消、商户取消、客服取消、系统取消（比如：骑士接单后一直未取货）， 此时订单的状态为5，可以通过“重新发单”来下发订单。
2. 妥投异常：配送员在收货地，无法正常送到用户手中（包括用户电话打不通、客户暂时不方便收件、客户拒收、货物有问题等等）
3. 状态1000：表示因为达达内部服务异常，导致下发订单失败。可以通过“新增订单”来下发订单。

接口测试链接：https://newopen.imdada.cn/#/quickStart/develop/apiTest

### 1.6、订单详情查询

#### 1.6.1、接口简介

查询订单的相关信息以及骑手的相关信息，具体信息参见参数说明。

#### 1.6.2、请求参数说明

| 名称     | 类型   | 是否必传 | 描述           |
| -------- | ------ | -------- | -------------- |
| order_id | String | 是       | 第三方订单编号 |

#### 1.6.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

注：只有当订单被接单后才会有骑手信息，并且在待取货和配送中可以查询骑手实时的坐标信息。

| 参数名称         | 类型       | 描述                                                         |
| ---------------- | ---------- | ------------------------------------------------------------ |
| orderId          | String     | 第三方订单编号                                               |
| statusCode       | Integer    | 订单状态(待接单＝1,待取货＝2,配送中＝3,已完成＝4,已取消＝5, 指派单=8,妥投异常之物品返回中=9, 妥投异常之物品返回完成=10, 骑士到店=100,创建达达运单失败=1000 可参考文末的状态说明） |
| statusMsg        | String     | 订单状态                                                     |
| transporterName  | String     | 骑手姓名                                                     |
| transporterPhone | String     | 骑手电话                                                     |
| transporterLng   | String     | 骑手经度                                                     |
| transporterLat   | String     | 骑手纬度                                                     |
| deliveryFee      | Double     | 配送费,单位为元                                              |
| tips             | Double     | 小费,单位为元                                                |
| couponFee        | Double     | 优惠券费用,单位为元                                          |
| insuranceFee     | Double     | 保价费,单位为元                                              |
| actualFee        | Double     | 实际支付费用,单位为元                                        |
| distance         | Double     | 配送距离,单位为米                                            |
| createTime       | String     | 发单时间                                                     |
| acceptTime       | String     | 接单时间,若未接单,则为空                                     |
| fetchTime        | String     | 取货时间,若未取货,则为空                                     |
| finishTime       | String     | 送达时间,若未送达,则为空                                     |
| cancelTime       | String     | 取消时间,若未取消,则为空                                     |
| orderFinishCode  | String     | 收货码                                                       |
| deductFee        | BigDecimal | 违约金                                                       |

#### 1.6.4、请求案例

```php
<?php
    $data = new Dada();
    $orderDetails =new OrderDetails();
    $orderDetails->setOrderId('20210416111032767383');
    $req = new DadaRequestClient($data, $orderDetails);
    var_dump($req->makeRequest());
```

### 1.7、取消订单

#### 1.7.1、接口简介

在订单待接单或待取货情况下，调用此接口可取消订单。

取消费用说明：

- 接单1 分钟以内取消不扣违约金；
- 接单后1－15分钟内取消订单，运费退回。同时扣除2元作为给配送员的违约金；

- 配送员接单后15 分钟未到店，商户取消不扣违约金；

- 系统取消订单说明：超过72小时未接单系统自动取消。每天凌晨2点，取消大于72小时未完成的订单。

#### 1.7.2、请求参数说明

| 名称             | 类型    | 是否必传 | 描述                                                         |
| ---------------- | ------- | -------- | ------------------------------------------------------------ |
| order_id         | String  | 是       | 第三方订单编号                                               |
| cancel_reason_id | Integer | 是       | 取消原因ID（[取消原因列表](https://newopen.imdada.cn/#/development/file/reasonList)） |
| cancel_reason    | String  | 否       | 取消原因(当取消原因ID为其他时，此字段必填)                   |

#### 1.7.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数

| 参数名称   | 类型   | 描述                   |
| ---------- | ------ | ---------------------- |
| deduct_fee | Double | 扣除的违约金(单位：元) |

#### 1.7.4、取消原因列表

| 取消ID | 取消原因                         |
| ------ | -------------------------------- |
| 1      | 没有配送员接单                   |
| 2      | 配送员没来取货                   |
| 3      | 配送员态度太差                   |
| 4      | 顾客取消订单                     |
| 5      | 顾客取消订单                     |
| 34     | 顾客取消订单                     |
| 35     | 顾客取消订单                     |
| 36     | 我不需要配送了                   |
| 37     | 配送员以各种理由表示无法完成订单 |
| 10000  | 配送员以各种理由表示无法完成订单 |

#### 1.7.5、请求案例

```php
<?php
    $data = new Dada();
    $cancelOrder = new CancelOrder();
    $cancelOrder->setOrderId('20210416111032767384');
    $cancelOrder->setCancelReasonId(4);
    $req = new DadaRequestClient($data, $cancelOrder);
    var_dump($req->makeRequest());
```

成功返回值：

```php
[
  "status" => "success",
  "code" => 0,
  "msg" => "成功",
  "result" => [
    "deduct_fee" => 0
  ]
]
```

### 1.8、追加订单

#### 1.8.1、接口简介

商户调用该接口将已发布的订单追加给指定的配送员,

1. 追加的订单必须是该门店发出的处于待接单状态的订单

2. 只能从符合条件的配送员列表选取配送员进行追加,参考[查询追加配送员](https://newopen.imdada.cn/#/development/file/listTransportersToAppoint)

#### 1.8.2、请求参数说明

| 名称           | 类型    | 是否必传 | 描述               |
| -------------- | ------- | -------- | ------------------ |
| order_id       | String  | 是       | 追加的第三方订单ID |
| transporter_id | Integer | 是       | 追加的配送员ID     |
| shop_no        | String  | 是       | 追加订单的门店编码 |

#### 1.8.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

正确的响应结果

```php
[
    "status" => "success",
    "code" => 0,
    "msg" => "成功"
]
```

失败的响应结果

```php
[
    "status" => "fail",
    "errorCode" => 2070,
    "code" => 2070,
    "msg" => "指派的订单已被接单"
]
```

#### 1.8.4、请求案例

```php
<?php
    $data = new Dada();
    $appendOrder = new AppendOrder();
    $appendOrder->setOrderId('20210416111032767384');
    $appendOrder->setTransporterId('666');
    $appendOrder->setShopNo('11047059');
    $req = new DadaRequestClient($data, $appendOrder);
    var_dump($req->makeRequest());
```

### 1.9、取消追加订单

#### 1.9.1、接口简介

商户调用该接口取消已发布的追加订单

注：被取消的追加订单，状态变为待接单，其他配送员可见

#### 1.9.2、请求参数说明

| 名称     | 类型   | 是否必传 | 描述         |
| -------- | ------ | -------- | ------------ |
| order_id | String | 是       | 第三方订单号 |

#### 1.9.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

正确的响应结果

```php
[
    "status" => "success",
    "code" => 0,
    "msg" => "成功"
]
```

失败的响应结果

```php
[
    "status" => "fail",
    "errorCode" => 2070,
    "code" => 2070,
    "msg" => "指派的订单已被接单"
]
```

#### 1.9.4、请求案例

```php
<?php
    $data = new Dada();
    $cancelAppendOrder = new CancelAppendOrder();
    $cancelAppendOrder->setOrderId('20210416111032767384');
    $req = new DadaRequestClient($data, $cancelAppendOrder);
    var_dump($req->makeRequest());
```

### 1.10、查询追加配送员

#### 1.10.1、接口简介

商户调用该接口查询可追加订单的配送员列表

可追加的配送员需符合以下条件:

1. 配送员在1小时内接过此商户的订单,且订单未完成

2. 配送员在当前商户接单数小于系统限定的指定商户接单总数

3. 配送员在达达平台的接单数量未达上限

#### 1.10.2、请求参数说明

| 名称    | 类型   | 是否必传 | 描述     |
| ------- | ------ | -------- | -------- |
| shop_no | String | 是       | 门店编码 |

#### 1.10.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

result业务参数：

| 参数名称 | 类型    | 描述       |
| -------- | ------- | ---------- |
| id       | Integer | 配送员id   |
| name     | String  | 配送员姓名 |
| city_id  | Integer | 配送员城市 |

正确的响应结果

```php
[
  "status" => "success",
  "code" => 0,
  "msg" => "成功",
  "result" => [
    [
      "phone" => "13546670420",
      "name" => "达达骑手",
      "id" => 666,
      "city_id" => 1
    ]
  ]
]
```

#### 1.10.4、请求案例

```php
<?php
    $data = new Dada();
    $appendTransporter = new AppendTransporter();
    $appendTransporter->setShopNo('11047059');
    $req = new DadaRequestClient($data, $appendTransporter);
    var_dump($req->makeRequest());
```

### 1.11、商家投诉达达

#### 1.11.1、接口简介

达达配送员接单后，商家如果对达达服务不满意，均可以使用该接口对达达进行投诉。

#### 1.11.2、请求参数说明

| 名称      | 类型    | 是否必传 | 描述                                                         |
| --------- | ------- | -------- | ------------------------------------------------------------ |
| order_id  | String  | 是       | 第三方订单编号                                               |
| reason_id | Integer | 是       | 投诉原因ID（[投诉原因列表](https://newopen.imdada.cn/#/development/file/complaintReasons)） |

#### 1.11.3、返回结果

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

正确的响应结果

```php
[
   "status" => "success",
   "code" => 0,
   "msg" => "成功",
]
```

失败的响应结果

```php
[
   "status" => "fail",
   "code" => 2134,
   "errorCode" => 2134,
   "msg" => "规定时间送达，投诉无效",
]
```

#### 1.11.4、请求案例

```php
<?php
    $data = new Dada();
    $complaintDada = new ComplaintDada();
    $complaintDada->setOrderId('20210416111032767384');
    $complaintDada->setReasonId('4');
    $req = new DadaRequestClient($data, $complaintDada);
    var_dump($req->makeRequest());
```



### 1.12、妥投异常之物品返回完成

#### 1.12.1、接口简介

订单妥投异常后，订单状态变为9，骑士将物品进行返还，如果商家确认收到物品后，可以使用该 接口进行确认，订单状态变成10，同时订单终结。

#### 1.12.2、请求参数说明

| 名称     | 类型   | 是否必传 | 描述           |
| -------- | ------ | -------- | -------------- |
| order_id | String | 是       | 第三方订单编号 |

#### 1.12.3、返回结果

返回array格式，以下为参数说明

| 参数名称 | 类型    | 描述                                    |
| -------- | ------- | --------------------------------------- |
| status   | String  | 响应状态，成功为"success"，失败为"fail" |
| code     | Integer | 响应返回码，参考接口返回码              |
| msg      | String  | 响应描述                                |
| result   | Object  | 响应结果，JSON对象，详见具体的接口描述  |

#### 1.12.4、请求案例

```php
<?php
    $data = new Dada();
    $confirmAbnormalGoods = new ConfirmAbnormalGoods();
    $confirmAbnormalGoods->setOrderId('20210416111032767384');
    $req = new DadaRequestClient($data, $confirmAbnormalGoods);
    var_dump($req->makeRequest());
```

## 2、商户管理

### 2.1、获取城市信息

#### 2.1.1、接口简介

通过接口，获取城市信息列表

注：当没有业务参数的时候, body需要赋值为空字符串,即body:""。

#### 2.1.2、请求参数说明

无

#### 2.1.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码，与code一致                                         |

#### 2.1.4、result业务参数

| 参数名称 | 类型   | 描述     |
| -------- | ------ | -------- |
| cityName | String | 城市名称 |
| cityCode | String | 城市编码 |

#### 2.1.5、请求案例

```php
<?php
    $data = new Dada();
    $cityCode = new CityCode();
    $req = new DadaRequestClient($data, $cityCode);
    var_dump($req->makeRequest());
```

### 2.2、注册商户

#### 2.2.1、接口简介

商户注册接口,并完成与该商户的绑定.生成的初始化密码会以短信形式发送给注册手机号

#### 2.2.2、请求参数说明

| 名称               | 类型   | 是否必填 | 描述                            |
| ------------------ | ------ | -------- | ------------------------------- |
| mobile             | String | 是       | 注册商户手机号,用于登陆商户后台 |
| city_name          | String | 是       | 商户城市名称(如,上海)           |
| enterprise_name    | String | 是       | 企业全称                        |
| enterprise_address | String | 是       | 企业地址                        |
| contact_name       | String | 是       | 联系人姓名                      |
| contact_phone      | String | 是       | 联系人电话                      |
| email              | String | 是       | 邮箱地址                        |

#### 2.2.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode |         |                                                              |

正确响应的结果

```php
[
    "status" => "success",
    "result" => 73767,
    "code" => 0,
    "msg" => "成功"
]
```

#### 2.2.4、请求案例

```php
<?php
    $data = new Dada();
    $merchantAdd = new MerchantAdd();
    $merchantAdd->setMobile('13800138000');
    $merchantAdd->setCityName('上海');
    $merchantAdd->setEnterpriseName('优雅谷');
    $merchantAdd->setEnterpriseDddress('上海街');
    $merchantAdd->setContactName('张三1');
    $merchantAdd->setContactPhone('13800138000');
    $merchantAdd->setEmail('123456.gd@163.com');
    $req = new DadaRequestClient($data, $merchantAdd);
    var_dump($req->makeRequest());
```

注：把 source_id 的值设置为空

### 2.3、新增门店

#### 2.3.1、接口简介

1. 门店编码可自定义，但必须唯一，若不填写，则系统自动生成。发单时用于确认发单门店
2. 如果需要使用达达商家App发单，请设置登陆达达商家App的账号（必须手机号）和密码
3. 该接口为批量接口,业务参数为数组

#### 2.3.2、请求参数说明

| 名称            | 类型    | 是否必填 | 描述                                                         |
| --------------- | ------- | -------- | ------------------------------------------------------------ |
| station_name    | String  | 是       | 门店名称                                                     |
| business        | Integer | 是       | 业务类型(食品小吃-1,饮料-2,鲜花绿植-3,文印票务-8,便利店-9,<br />水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,<br />服装-26,汽修零配-27,数码家电-28,小龙虾-29,个人-50,火锅-51,<br />个护美妆-53、母婴-55,家居家纺-57,手机-59,家装-61,其他-5) |
| city_name       | String  | 是       | 城市名称(如,上海)                                            |
| area_name       | String  | 是       | 区域名称(如,浦东新区)                                        |
| station_address | String  | 是       | 门店地址                                                     |
| lng             | Double  | 是       | 门店经度                                                     |
| lat             | Double  | 是       | 门店纬度                                                     |
| contact_name    | String  | 是       | 联系人姓名                                                   |
| phone           | String  | 是       | 联系人电话                                                   |
| origin_shop_id  | String  | 否       | 门店编码,可自定义,但必须唯一;若不填写,则系统自动生成         |
| id_card         | String  | 否       | 联系人身份证                                                 |
| username        | String  | 否       | 达达商家app账号(若不需要登陆app,则不用设置)                  |
| password        | String  | 否       | 达达商家app密码(若不需要登陆app,则不用设置)                  |

#### 2.3.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode |         |                                                              |

#### 2.3.4、result业务参数

| 参数名称    | 类型    | 描述                     |
| ----------- | ------- | ------------------------ |
| success     | Integer | 成功导入门店的数量       |
| successList | List    | 成功导入的门店           |
| failedList  | List    | 导入失败门店编号以及原因 |

#### 2.3.5、请求案例

```php
<?php
    $data = new Dada();
    $shopAdd = new ShopAdd();
    $shopAdd->setStationName('优雅谷');
    $shopAdd->setBusiness(1);
    $shopAdd->setCityName('上海');
    $shopAdd->setAreaName('浦东新区');
    $shopAdd->setStationAddress('浦东新区');
    $shopAdd->setLng(113.403081);
    $shopAdd->setLat(22.51043);
    $shopAdd->setContactName('游龙');
    $shopAdd->setPhone('13800138000');
    $req = new DadaRequestClient($data, $shopAdd);
    var_dump($req->makeRequest());
```

### 2.4、编辑门店

#### 2.4.1、接口简介

门店编码是必传参数。其他参数，需要更新则传，且不能为空。

#### 2.4.2、请求参数说明

| 名称            | 类型    | 是否必填 | 描述                                                         |
| --------------- | ------- | -------- | ------------------------------------------------------------ |
| origin_shop_id  | String  | 是       | 门店编码,可自定义,但必须唯一;若不填写,则系统自动生成         |
| new_shop_id     | String  | 否       | 新的门店编码                                                 |
| station_name    | String  | 否       | 门店名称                                                     |
| business        | Integer | 否       | 业务类型(食品小吃-1,饮料-2,鲜花绿植-3,文印票务-8,便利店-9,<br />水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,<br />服装-26,汽修零配-27,数码家电-28,小龙虾-29,个人-50,火锅-51,<br />个护美妆-53、母婴-55,家居家纺-57,手机-59,家装-61,其他-5) |
| city_name       | String  | 否       | 城市名称(如,上海)                                            |
| area_name       | String  | 否       | 区域名称(如,浦东新区)                                        |
| station_address | String  | 否       | 门店地址                                                     |
| lng             | Double  | 否       | 门店经度                                                     |
| lat             | Double  | 否       | 门店纬度                                                     |
| contact_name    | String  | 否       | 联系人姓名                                                   |
| phone           | String  | 否       | 联系人电话                                                   |
| status          | Integer | 否       | 门店状态（1-门店激活，0-门店下线）                           |

#### 2.4.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码（[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code)） |

正确的响应结果

```php
[
    "status" => "success",
    "code" => 0,
    "msg" => "成功"
]
```

失败的响应结果

```php
[
    "status" => "fail",
    "errorCode" => 2406,
    "code" => 2406,
    "msg" => "没有可以更新的参数,请重新核对"
]
```

#### 2.4.4、请求案例

```php
<?php
    $data = new Dada();
    $shopUpdate = new ShopUpdate();
    $shopUpdate->setOriginShopId('shop001');
    $shopUpdate->setStationName('优雅谷');
    $shopUpdate->setBusiness(1);
    $shopUpdate->setCityName('上海');
    $shopUpdate->setAreaName('浦东新区');
    $shopUpdate->setStationAddress('浦东新区');
    $shopUpdate->setLng(113.403081);
    $shopUpdate->setLat(22.51043);
    $shopUpdate->setContactName('游龙');
    $shopUpdate->setPhone('13800138000');
    $req = new DadaRequestClient($data, $shopUpdate);
    var_dump($req->makeRequest());
```

### 2.5、门店详情

#### 2.5.1、接口简介

查询门店详情接口

#### 2.5.2、请求参数说明

| 名称           | 类型   | 是否必填 | 描述     |
| -------------- | ------ | -------- | -------- |
| origin_shop_id | String | 是       | 门店编码 |

#### 2.5.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码（[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code)） |

#### 2.5.4、result业务参数

| 名称            | 类型    | 描述                                                         |
| --------------- | ------- | ------------------------------------------------------------ |
| origin_shop_id  | String  | 门店编码,可自定义,但必须唯一;若不填写,则系统自动生成         |
| station_name    | String  | 门店名称                                                     |
| business        | Integer | 业务类型(食品小吃-1,饮料-2,鲜花绿植-3,文印票务-8,便利店-9,<br />水果生鲜-13,同城电商-19, 医药-20,蛋糕-21,酒品-24,小商品市场-25,<br />服装-26,汽修零配-27,数码家电-28,小龙虾-29,个人-50,火锅-51,<br />个护美妆-53、母婴-55,家居家纺-57,手机-59,家装-61,其他-5) |
| city_name       | String  | 城市名称(如,上海)                                            |
| area_name       | String  | 区域名称(如,浦东新区)                                        |
| station_address | String  | 门店地址                                                     |
| lng             | Double  | 门店经度                                                     |
| lat             | Double  | 门店纬度                                                     |
| contact_name    | String  | 联系人姓名                                                   |
| phone           | String  | 联系人电话                                                   |
| id_card         | String  | 联系人身份证                                                 |
| status          | Integer | 门店状态（1-门店激活，0-门店下线）                           |

#### 2.5.5、请求案例

```php
<?php
    $data = new Dada();
    $shopDetail = new ShopDetail();
    $shopDetail->setOriginShopId('shop001');
    $req = new DadaRequestClient($data, $shopDetail);
    var_dump($req->makeRequest());
```

## 3、消息通知

### 3.1、消息通知简介

#### 3.1.1、简介

1.登录开发者账号，在【属性设置】里配置【接收消息URL地址】。

2.当产生对应类型的消息时，达达开放平台会将消息推送至配置的URL地址。

#### 3.1.2、推送消息参数说明

| 名称        | 类型   | 是否必填 | 描述                                |
| ----------- | ------ | -------- | ----------------------------------- |
| messageType | int    | 是       | 消息类型（1：骑士取消订单推送消息） |
| messageBody | String | 是       | 消息内容（json字符串）              |

#### 3.1.3、消息地址应返回的结果

返回JSON格式，以下为返回结果说明

| 参数名称 | 类型   | 描述                   |
| -------- | ------ | ---------------------- |
| status   | String | 响应状态（ok或者fail） |

正确的响应结果（JSON格式）

```json
{"status":"ok"}
```

错误的响应结果（JSON格式）

```json
{"status":"fail"}
```

注：

1. 不同的messageType决定不同的messageBody。

2. 不同的messageType需要不同的处理方式。

3. 如果返回失败(status='fail')或者请求超时，达达侧会重试3次。

### 3.2、消息确认

#### 3.2.1、接口简介

1.商家接受到消息后，根据不同的messageType作不同的操作。

2.当产生对应类型的消息时，达达开放平台会将消息推送至配置的URL地址。

#### 3.2.2、推送消息参数说明

| 名称        | 类型   | 是否必填 | 描述                                                         |
| ----------- | ------ | -------- | ------------------------------------------------------------ |
| messageType | int    | 是       | 消息类型（1：[骑士取消订单推送消息](https://newopen.imdada.cn/#/development/file/transporterCancelOrder)） |
| messageBody | String | 是       | 消息内容（json字符串）                                       |

#### 3.2.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码（[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code)） |

#### 3.2.4、请求案例

```php
<?php
    $data = new Dada();
    $messageInform = new MessageInform();
    $messageInform->setMessageType(1);
    $messageInform->setMessageBody([
        'orderId'   => '20210416111032767384', // 消息类型（1：骑士取消订单推送消息）
        'dadaOrderId'   => '277073797294677', // 达达订单号，选填
        'isConfirm'   => 1, // 0:不同意，1:表示同意
    ]);
    $req = new DadaRequestClient($data, $messageInform);
    var_dump($req->makeRequest());
```

### 3.3、骑士取消订单

#### 3.3.1、接口交互简介

1.骑士取消订单后，达达开放平台推送消息至商家配置的URL。

2.商家接收到消息后，进行确认操作。

注：

商户接收到消息，返回ok或者success

#### 3.3.2、推送消息的请求参数说明

| 名称         | 类型   | 是否必填 | 描述             |
| ------------ | ------ | -------- | ---------------- |
| orderId      | String | 是       | 商家第三方订单号 |
| dadaOrderId  | long   | 否       | 达达订单号       |
| cancelReason | String | 是       | 骑士取消原因     |

#### 3.3.3、接收到消息后的确认参数说明

| 名称        | 类型   | 是否必填 | 描述                 |
| ----------- | ------ | -------- | -------------------- |
| orderId     | String | 是       | 商家第三方订单号     |
| dadaOrderId | long   | 否       | 达达订单号           |
| isConfirm   | int    | 是       | 0:不同意，1:表示同意 |

## 4、充值管理

### 4.1、获取充值链接

#### 4.1.1、请求参数说明

| 名称       | 类型   | 是否必填 | 描述                                                         |
| ---------- | ------ | -------- | ------------------------------------------------------------ |
| amount     | Double | 是       | 充值金额（单位元，可以精确到分）                             |
| category   | String | 是       | 生成链接适应场景（category有二种类型值：PC、H5）             |
| notify_url | String | 否       | 支付成功后跳转的页面（支付宝在支付成功后可以跳转到某个指定的页面，微信支付不支持） |

#### 4.1.2、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码（[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code)） |

#### 4.1.3、请求案例

```php
<?php
    $data = new Dada();
    $recharge = new Recharge();
    $recharge->setAmount(1);
    $recharge->setCategory('PC');
    $req = new DadaRequestClient($data, $recharge);
    var_dump($req->makeRequest());
```

返回值：

```php
[
  "status" => "success",
  "code" => 0,
  "msg" => "成功",
  "result" => "达达收银台URL地址"
]
```

### 4.2、查询账户余额

#### 4.2.1、接口简介

使用此接口可以查询运费账户或红包账户的余额。

#### 4.2.2、请求参数说明

| 名称     | 类型    | 是否必填 | 描述                                                         |
| -------- | ------- | -------- | ------------------------------------------------------------ |
| category | Integer | 否       | 查询运费账户类型（1：运费账户；2：红包账户，3：所有），默认查询运费账户余额 |

#### 4.2.3、返回结果 

返回array格式，以下为参数说明

| 参数名称  | 类型    | 描述                                                         |
| --------- | ------- | ------------------------------------------------------------ |
| status    | String  | 响应状态，成功为"success"，失败为"fail"                      |
| code      | Integer | 响应返回码，参考[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code) |
| msg       | String  | 响应描述                                                     |
| result    | Object  | 响应结果，JSON对象，详见具体的接口描述                       |
| errorCode | Integer | 错误编码（[接口返回码](https://newopen.imdada.cn/#/quickStart/develop/code)） |

#### 4.2.4、请求案例

```php
<?php
    $data = new Dada();
    $balanceQuery = new BalanceQuery();
    $balanceQuery->setCategory(3); // 查询运费账户类型（1：运费账户；2：红包账户，3：所有），默认查询运费账户余额
    $req = new DadaRequestClient($data, $balanceQuery);
    var_dump($req->makeRequest());
```

返回值

```php
[
  "status" => "success",
  "code" => 0,
  "msg" => "成功",
  ["result"]=> [
     "deliverBalance" => 9974854.9,
    "redPacketBalance" => 1000000
  ]
]
```

