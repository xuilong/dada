<?php
namespace youlong\dada;

use youlong\config\Config;

class Dada extends Config
{
    public function __construct($config = [])
    {
        /**
         * $source_id 商户ID
         * $online 环境：false测试环境，true运营环境
         */
        parent::__construct($config);
    }
}