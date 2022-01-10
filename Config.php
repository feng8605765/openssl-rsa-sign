<?php

class Config
{
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

    public static $pfxpath = 'test_cer.pfx';

    public static $cerpath = 'test_cer.cer';

    public static $pripem = "private_test.pem";

    public static $pubpem = "public_test.pem";

}