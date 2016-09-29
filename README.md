# payment-auth

支持商户使用自有支付宝和微信账号收款

## 业务流程

![flowchart](flowchart.png)


流程说明：

- App开发者可以提供服务端`红包SDK(Server)`来使用自有支付宝和微信账号收款。
- App开发者需要为 `红包SDK(Server)` 提供REST API，供云账户访问，以便为支付订单生成签名。
- 一旦用户在`红包SDK`中支付完成，云账户服务器会首先接收渠道通知，然后云账户会对用户支付成功事件进行通知，App开发者需要对此事件订阅。关于事件订阅，可参考 [红包消息推送](https://github.com/YunzhanghuOpen/redpacket-webhooks) 文档。
- App开发者调通功能上线前，需要联系云账户技术同学，告知期望启用的支付宝、微信支付等具体通道，并告知对应商户号。
客服热线: 400-6565-739
技术支持QQ群: 366135448

## 红包SDK(Server) 

`红包SDK(Server)` 用于对支付订单签名，由一个接口支持支付宝和微信支付等多种支付方式的订单生成签名，以便认证服务。

### 接口定义

- 接口: http(https)://`app.host.com`/rpserversdk/payment/auth
- 方法: POST
- 输入：header为：Content-Type: application/json
   输入参数是一个JSON对象，有属性 channel 和 orderInfo。channel告知支付方式，其取值包括ALIPAY，WECHAT等。输入JSON对象的orderInfo的具体构成，则由对应的支付方式决定，代表发起支付时的标准的请求对象。
- 输出：签名值sign，string类型，其生成方法参考对应支付方式的标准方法，针对上述orderInfo对象生成签名。

举例：

云账户发出的请求

```shell
curl -X POST -H "Content-Type: application/json" -d '{
"channel":"ALIPAY",
"orderInfo": {
  "service":"mobile.securitypay.pay",
  "partner":"",
  "_input_charset":"utf-8",
  "sign_type":"RSA",
  "sign":"",
  "notify_url":"http:\/\/***REMOVED***",
  "out_trade_no":"3242398127981",
  "subject":"\u5546\u54c1\u4ed8\u6b3e",
  "payment_type":"1",
  "seller_id":"",
  "total_fee":100,
  "body":"\u5546\u54c1\u4ed8\u6b3e\u8be6\u60c5",
  "it_b_pay":"30m"
}
}' "https://app.host.com/rpserversdk/payment/auth"
```


### 集成

Demo 下载

1. [PHP](PHP)
1. [Java](Java)
1. [Node.js](nodejs)
1. [Go](Go)



