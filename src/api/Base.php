<?php
namespace youlong\api;

class Base
{
    const FAIL = "fail";
    const SUCCESS = "success";
    const FAIL_MSG = "接口请求超时或失败";
    const FAIL_CODE = -2;

    public static function error($error)
    {
        return trigger_error($error . '不能为空', E_USER_ERROR);
    }
}