# PHP 版本

## 安装方法

1. 包含 RpServerSDK 目录
1. 暴露接口地址，供云账户访问
1. 调用签名方法对云账户订单签名
1. 返回签名结果

## 快速使用

### 下载 Demo 文件

克隆项目，或者直接下载
	
```shell
git clone git@github.com:YunzhanghuOpen/payment-auth.git
cd payment-auth/php
```

直接下载
	
https://github.com/YunzhanghuOpen/payment-auth/archive/master.zip

### 测试 Demo

模拟支付宝订单
	
```shell
php index.php alipay

_input_charset=utf-8&body=商品付款详情&channel=ALIPAY&it_b_pay=30m&notify_url=http://***REMOVED***&out_trade_no=3242398127981&partner=2081222667389722&payment_type=1&seller_id=2081222667389722&service=mobile.securitypay.pay&subject=商品付款&total_fee=100&sign=OgAp%2BiuiLVmteIH3h5KyLRa0NhWn%2BALe%2FQrUTCnzHssf5Xi%2FWj0A01UiwtEwk3R7%2Bab6tP6vUaWYDIgdh7tmItu7iz8VoMsk9AuBmI9D22ZtcfHEfmwlqrWmsXUt3PWyGREjsBgQeu0o94iVs5KeBqqoe3otvFUJ31EVD%2Boji6w%3D%
```
	

模拟微信订单
	
```shell
php index.php wechat

OgAp%2BiuiLVmteIH3h5KyLRa0NhWn%2BALe%2FQrUTCnzHssf5Xi%2FWj0A01UiwtEwk3R7%2Bab6tP6vUaWYDIgdh7tmItu7iz8VoMsk9AuBmI9D22ZtcfHEfmwlqrWmsXUt3PWyGREjsBgQeu0o94iVs5KeBqqoe3otvFUJ31EVD%2Boji6w%3D%
```
	



