# payment-auth

商户自有支付宝和微信账号收款

## 业务流程

![flowchart](flowchart.png)


流程说明：

- App开发者可以集成服务端`红包SDK(Server)`来使用自有支付宝和微信账号收款。
- App开发者需要为 `红包SDK(server)` 开放网络接口，供云账户访问，以进行申请订单授权。
- 一旦用户在`红包SDK`中支付完成，云账户服务器会首先接收渠道通知，然后云账户会对用户支付成功事件进行通知，App开发者需要对此事件订阅。关于事件订阅，可参考 [红包消息推送](https://github.com/YunzhanghuOpen/redpacket-webhooks) 文档。

## 红包SDK(Server) 

`红包SDK(Server)` 用于对支付订单签名。

### 接口定义

- 接口: http(https)://`app.host.com`/rpserversdk/payment/auth
- 方法: POST
- Content-Type: application/json

举例：

云账户发出的请求

```js
curl -X POST -H "Content-Type: application/json" -d '{
"service":"mobile.securitypay.pay",
"partner":"",
"_input_charset":"utf-8",
"sign_type":"RSA",
"sign":"",
"channel":"ALIPAY",
"notify_url":"http:\/\/***REMOVED***",
"out_trade_no":"3242398127981",
"subject":"\u5546\u54c1\u4ed8\u6b3e",
"payment_type":"1",
"seller_id":"",
"total_fee":100,
"body":"\u5546\u54c1\u4ed8\u6b3e\u8be6\u60c5",
"it_b_pay":"30m"
}' "https://app.host.com/rpserversdk/payment/auth"
```


### 集成

Demo 下载

1. [PHP](php)
1. [Java](java)
1. [NodeJs](nodejs)
1. [Go](go)



