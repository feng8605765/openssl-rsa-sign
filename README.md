# openssl-rsa-sign
PHP使用openssl函数库签发证书的简单用例
## 使用技巧
> 需要安装以及开启 Openssl 扩展，将会使用到

## 使用步骤
```phpt
php test.php [options]
```
OPTIONS说明：

* key：生成公钥和私钥的文件
* cer：生成证书
* sign：验证是否成功

## config配置分析
```phpt
    /**
     * 创建密钥的配置
     * @var array
     */
    public static $config = [
        "digest_alg" => "sha512", // 文摘
        "private_key_bits" => 4096, // 私钥位 字节数
        "private_key_type" => OPENSSL_KEYTYPE_RSA, // 加密密钥类型
        "config" => "/etc/ssl/openssl.cnf"
    ];

    public static $privateKeypass = 123456;  // 密钥

    public static $pfxpath = 'test_cer.pfx'; // 证书

    public static $cerpath = 'test_cer.cer'; // 证书

    public static $pripem = "private_test.pem"; // 私钥

    public static $pubpem = "public_test.pem"; // 公钥
```
