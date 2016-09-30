<?php

/**
 * 支付宝下单参数签名
 *
 * Class AlipayAuth
 */
class AlipayAuth
{

    // 商户号
    private $partner = '2081222667389722';
    // 商户私钥
    private $private_key =  <<<EOT
-----BEGIN PRIVATE KEY-----
MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAOz5IGA2Da5p/q8C
a9IQNd0N3LgamPjtEhQDr7aUV+yZarwEYuUp1Tpl9Qw4Lxs5DdmNC+8U4jTqubEl
Fv3naPIMesRb1NusRliktvFij4R2mlYWbxKn/HCsYPoUVfV2CtWNBkVKrt2Ghhfh
8m7kiEWj2D6OBMuT8LJrIsfsSYtrAgMBAAECgYEAiy+ESZ5WCNRu56IXbCljSbQj
qOrOYJ72GFVV9npI7knp/Abjg1A/0m4iMQwq9uVa8iW7FbEBcC1R5e8wAu/RngAV
ADvz9SzmXj8V6HwSKmdWNQ1/99swM5/r4f5eRVvMkRfepMy9mH78f3amQkdtQWab
+xJu6TpIQNQRKhWwYbkCQQD/2zjowrijgNnGiGMNlRWxRPUxbaNASc1631nNwU58
gVBRNOmR415mhlXd08af2zJJMEd6XQm4bakcL6L3dXyfAkEA7RswmLSAtVYqCyv/
lZ+/yNxjkDlgl94PasjEhreHk7YBuq+FvoMCs9Pmrf19znjc+uRk7Y+eM9kZu6+9
a+IxtQJBAM19qKtpGRpYto/5onSaNJ33oGZehCtyGxKAqIPUqdDdm0BdmuqNDpiR
dA2BtZlWV4Dowb/JUbFKgfQdXmoZdkkCQQC831TVv6trR8jT/2dn28odCZnx8BLG
xugHCwipu5avDmPQPzNNr/S+JMTzwiKuD08QOFFBf47pBD5gaLx+LL+lAkBZHZUA
ABwXzbLxi2zqSa6e6Bf71k/bnmpBLCtcs389D+q6y7eMLGeUJWr6UTCQI+PZixZQ
GhrAuvWrlO1hECqA
-----END PRIVATE KEY-----
EOT;

    /**
     * 创建签名
     * @param $params 云账户申请的订单参数
     * @return string 签名结果
     */
    public function genSign($params)
    {
        $params = $this->_modifyParams($params);
        $params = $this->_filterParams($params);
        $params = $this->_sortParams($params);
        $linkString = $this->_createLinkString($params);
        $sign = $this->_signParams($linkString, $this->private_key);
        return $sign;
    }

    /**
     * 修改订单中的商户号为己方的商户号
     * @param $params
     * @return mixed
     */
    private function _modifyParams($params)
    {
        $params['partner'] = $this->partner;
        $params['seller_id'] = $this->partner;
        return $params;
    }

    /**
     * 过滤不验签的参数
     * @param $params
     * @return array
     */
    private function _filterParams($params)
    {
        $result = [];
        foreach ($params as $key => $value) {
            if ($key == 'sign' || $key == 'sign_type' || empty($value)) {
                continue;
            }
            $result[$key] = $value;
        }
        return $result;
    }

    /**
     * 参数排序
     * @param $params
     * @return mixed
     */
    private function _sortParams($params)
    {
        ksort($params);
        reset($params);
        return $params;
    }

    /**
     * 创建签名原始串
     * @param $params
     * @return string
     */
    private function _createLinkString($params)
    {
        $result = '';
        foreach ($params as $key => $value) {
            $result .= $key . '=' . $value . '&';
        }
        $result = substr($result, 0, strlen($result) - 1);
        if (get_magic_quotes_gpc()) {
            $result = stripslashes($result);
        }
//        echo "签名原始串:{$result}\n";
        return $result;
    }

    /**
     * 签名
     * @param $data
     * @param $priKey
     * @return string
     */
    private function _signParams($data, $priKey)
    {
        $res = openssl_get_privatekey($priKey);
        openssl_sign($data, $sign, $res);
        openssl_free_key($res);
        $sign = urlencode(base64_encode($sign));
//        echo "签名结果:{$sign}\n";
        return $sign;
    }

}
