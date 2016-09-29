<?php

include_once 'RpServerSDK/alipay.php';
include_once 'RpServerSDK/wechat.php';

const CHANNEL_ALIPAY = 'ALIPAY';
const CHANNEL_WECHAT = 'WECHAT';

// 1) 模拟要授权的订单请求

$httpInput = '';
$mockData = $argv[1];
if (strtolower($mockData) == strtolower(CHANNEL_ALIPAY)) {
    $httpInput = file_get_contents('alipay.json');
}
if (strtolower($mockData) == strtolower(CHANNEL_WECHAT)) {
    $httpInput = file_get_contents('wechat.json');
}
if (empty($httpInput)) {
    exit("请选择模拟支付宝订单或者微信支付订单\n");
}

// 2) 进行授权

$inputParamsArr = json_decode($httpInput, true);

$channel = $inputParamsArr['channel'];

switch($channel) {
    case CHANNEL_ALIPAY:
        $service = new AlipayAuth();
        $orderString = $service->genSign($inputParamsArr);
        break;
    
    case CHANNEL_WECHAT:
        $service = new WechatAuth();
        $orderString = $service->genSign($inputParamsArr);
        break;
    default:
        $sign = 'error';
        break;
}

// 3) 输出已签名的订单

echo $orderString;



