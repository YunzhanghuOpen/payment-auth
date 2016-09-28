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
php index.php < alipay.json
输出
```
	

模拟微信订单
	
```shell
php index.php < wechat.json
输出
```
	



