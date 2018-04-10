<?php

namespace pay\config;

use pay\com\Config;

class AliPay extends Config
{
    /**
     * 应用id
     * @var string
     */
    protected $app_id = '';

    /**
     * 应用加密串
     * @var string
     */
    protected $app_secert = '';

    /**
     * 微信支付商户id
     * @var string
     */
    protected $mch_id = '';

    /**
     * 微信支付加密串
     * @var string
     */
    protected $key = '';

    /**
     * 异步地址
     * @var string
     */
    protected $notify_url = '';

    /**
     * 同步回调地址
     * @var bool
     */
    protected $use_cert = false;

    /**
     * 微信Https证书文件地址
     * @var string
     */
    protected $sslcert_path = '';

    /**
     * 微信Https证书文件地址
     * @var string
     */
    protected $sslkey_path = '';

    /**
     * 设备ID
     * @var string
     */
    protected $device_info = 'WEB';

    /**
     * 下单接口地址
     * @var string
     */
    protected $unified_order_url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';

    /**
     * 订单查询接口地址
     * @var string
     */
    protected $order_query_url = 'https://api.mch.weixin.qq.com/pay/orderquery';

    /**
     * 订单关闭接口地址
     * @var string
     */
    protected $close_order_url = 'https://api.mch.weixin.qq.com/pay/closeorder';
}