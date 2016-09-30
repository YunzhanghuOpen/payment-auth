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
# 请求
php index.php alipay

# 输出
07TAj4xsqZN%2FyI%2BtsASXkLtyZukPeQn3Kt1my8J8s4xnvN0ZdP24iLqtFfl5r7Mc0%2B%2FtVWwSCRMOcyLx8tVATp8O2P8zt%2FtB5sPbS8huC1zoIDplVKbdbL%2FDlnW70eLNJl58yuI3OgGI7B7UUMRpa%2F%2BTuufJFOK3rcdiMcT%2FTdo%3D%
```
	

模拟微信订单
	
```shell
# 请求
php index.php wechat

# 输出
OgAp%2BiuiLVmteIH3h5KyLRa0NhWn%2BALe%2FQrUTCnzHssf5Xi%2FWj0A01UiwtEwk3R7%2Bab6tP6vUaWYDIgdh7tmItu7iz8VoMsk9AuBmI9D22ZtcfHEfmwlqrWmsXUt3PWyGREjsBgQeu0o94iVs5KeBqqoe3otvFUJ31EVD%2Boji6w%3D%
```
	



