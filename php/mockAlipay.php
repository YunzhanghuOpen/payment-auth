<?php

$params = [
// 基本参数
    'service' => 'mobile.securitypay.pay',
    'partner' => '',
    '_input_charset' => 'utf-8',
    'sign_type' => 'RSA',
    'sign' => '',
    'channel' => 'ALIPAY',
// 业务参数
    'notify_url' => 'http://***REMOVED***',
    'out_trade_no' => '3242398127981',
    'subject' => '商品付款',
    'payment_type' => '1',
    'seller_id' => '',
    'total_fee' => 100,
    'body' => '商品付款详情',
// 未付款交易的超时时间
    'it_b_pay' => '30m',
];

$json = json_encode($params);

echo $json . "\n";

