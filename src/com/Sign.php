<?php

namespace pay\com;

class Sign
{
    /**
     * 将参数拼接为url: key=value&key=value
     * @param   $params
     * @return  string
     */
    private static function toUrlParams($params)
    {
        $string = '';
        if (!empty($params)) {
            $array = array();
            foreach ($params as $key => $value) {
                if(empty($value)) continue;
                $array[] = $key . '=' . $value;
            }
            $string = implode("&", $array);
        }
        return $string;
    }

    /**
     * 微信生成签名(MD5)
     * @param array $params
     * @param $key
     * @return string
     */
    public static function makeSign($params,$key)
    {
        //签名步骤一：按字典序排序数组参数
        ksort($params);
        $string = self::toUrlParams($params);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $key;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     * 支付宝签名(RSA)
     * @param string $data
     * @param string $private_key
     * @param int $alg
     * @return string
     * @throws Error
     */
    public static function rsaSign($data, $private_key, $alg = OPENSSL_ALGO_SHA1)
    {
        $word = wordwrap($private_key, 64, "\n", true);
        $private_key = "-----BEGIN RSA PRIVATE KEY-----" . PHP_EOL . $word . PHP_EOL . "-----END RSA PRIVATE KEY-----";
        $res = openssl_get_privatekey($private_key);
        if ($res) {
            openssl_sign($data, $sign, $res, $alg);
        } else {
            throw new Error('您的私钥格式不正确!');
        }
        openssl_free_key($res);
        return base64_encode($sign);
    }

    /**
     * 支付宝验签(RSA)
     * @param string $data
     * @param string $public_key
     * @param string $sign
     * @param int $alg
     * @return bool
     * @throws Error
     */
    public static function rsaVerify($data, $public_key, $sign, $alg = OPENSSL_ALGO_SHA1)
    {
        $word = wordwrap($public_key, 64, "\n", true);
        $public_key = "-----BEGIN RSA PRIVATE KEY-----" . PHP_EOL . $word . PHP_EOL . "-----END RSA PRIVATE KEY-----";
        $res = openssl_get_publickey($public_key);
        if ($res) {
            $result = (bool)openssl_verify($data, base64_decode($sign), $res, $alg);
        } else {
            throw new Error('您的支付宝公钥格式不正确!');
        }
        openssl_free_key($res);
        return $result;
    }
}