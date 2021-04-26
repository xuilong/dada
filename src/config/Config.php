<?php
namespace youlong\config;

use function Couchbase\defaultDecoder;

class Config
{
    /**
     * 达达开发者app_key
     */
    public $app_key = '';

    /**
     * 达达开发者app_secret
     */
    public $app_secret = '';

    /**
     * api版本
     */
    public $v = "1.0";

    /**
     * 数据格式
     */
    public $format = "json";

    /**
     * 商户ID
     */
    public $source_id;

    /**
     * host
     */
    public $host;


    /**
     * 构造函数
     */
    public function __construct($config = []){
        if(empty($config)){
            $config = $this->getConfig();
        }
        //$this->source_id = isset($config['source_id'])?$config['source_id']:'73753';
        $this->source_id = !empty($source_id)?$source_id:(isset($config['source_id'])?$config['source_id']:'73753');
        $this->host = isset($config['host'])?$config['host']:'http://newopen.qa.imdada.cn';
        $this->app_key = isset($config['app_key'])?$config['app_key']:'';
        $this->app_secret = isset($config['app_secret'])?$config['app_secret']:'';
    }

    public function getAppKey(){
        return $this->app_key;
    }

    public function getAppSecret(){
        return $this->app_secret;
    }

    public function getV(){
        return $this->v;
    }

    public function getFormat(){
        return $this->format;
    }

    public function getSourceId(){
        return $this->source_id;
    }

    public function getHost(){
        return $this->host;
    }

    public function getConfig()
    {
        $dir = str_replace('\\', '/', __DIR__);
        $basePath = explode('vendor', $dir);
        if(!is_file($basePath[0] . '/config/dada.php')){
            return false;
        }
        // 判断当前文件是否存在
        return include_once $basePath[0] . '/config/dada.php';
    }
}