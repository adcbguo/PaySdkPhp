<?php

namespace pay\com;

use pay\config\AliPay;
use pay\config\WxPay;

class Config
{
    /**
     * 配置对象
     * @var AliPay|WxPay
     */
    protected $config;

    /**
     * 设置配置
     * @param $name
     * @param null $value
     */
    final public static function set($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                self::$key = $value;
            }
        } else {
            self::$name = $value;
        }
    }


    public function __construct()
    {

    }
}