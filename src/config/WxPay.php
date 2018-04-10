<?php

namespace pay\config;

use pay\com\Config;

class WxPay extends Config
{
    /**
     * 应用id
     * @var string
     */
    protected $app_id = '';

    /**
     * 密钥(去支付宝生成)
     * @var string
     */
    protected $private_key = '';

    /**
     * 支付宝公钥
     * @var string
     */
    protected $public_key = '';

    /**
     * 异步回调地址
     * @var string
     */
    protected $notify_url = '';

    /**
     * 同步回调地址
     * @var string
     */
    protected $return_url = '';

    /**
     * 加密方式
     * @var string
     */
    protected $sign_type = 'RSA2';

    /**
     * 字符编码格式 目前支持 gbk 或 utf-8
     * @var string
     */
    protected $charset = 'utf-8';

    /**
     * 支付宝网关
     * @var string
     */
    protected $gateway = 'https://openapi.alipay.com/gateway.do?';
}