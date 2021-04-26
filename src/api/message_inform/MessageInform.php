<?php
namespace youlong\api\message_inform;

use youlong\api\Base;
use youlong\config\UrlConfig;

/**
 * 消息确认
 * Class MessageInform
 * @package youlong\api\message_inform
 */
class MessageInform extends Base
{
    public $messageType; // 消息类型
    public $messageBody;
    public $url;

    public function __construct()
    {
        $this->url = UrlConfig::MESSAGE_CONFIRM_URL;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 	消息类型（1：骑士取消订单推送消息）
     * https://newopen.imdada.cn/#/development/file/transporterCancelOrder?_k=1o0i1z
     * @param $messageType
     */
    public function setMessageType($messageType)
    {
        !empty($messageType) ? $this->messageType = $messageType : self::error('messageType');
    }

    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * 消息内容（json字符串）
     * @param $messageBody 需要一个数据
     * 示例代码：["orderId" => "test001", "dadaOrderId" => "277073797294677", "isConfirm" => 0]
     */
    public function setMessageBody($messageBody)
    {
        // {\"orderId\": \"test001\", \"dadaOrderId\": \"277073797294677\", \"isConfirm\": 0}
        !empty($messageBody) ? $this->messageBody = json_encode($messageBody, JSON_UNESCAPED_UNICODE) : self::error('$messageBody');
    }

    public function getMessageBody()
    {
        return $this->messageBody;
    }
}