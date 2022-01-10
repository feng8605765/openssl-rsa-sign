<?php

class KeyGenerator
{
    // 新的私钥
    protected $res;
    // 密钥key
    private $privateKey;
    // 公钥key
    private $publicKey;
    // 配置
    public $generatorConfig;
    /**
     * 初始化时 生成一个新的私钥
     * @throws Exception
     */
    public function __construct()
    {
        $this->generatorConfig = Config::$config;

        $this->res = openssl_pkey_new($this->generatorConfig);

        if (empty($this->res)) {
            throw new Exception('生成密钥失败');
        }
    }

    /**
     * 生成密钥
     * @throws Exception
     */
    protected function generatePrivateKey()
    {
        openssl_pkey_export($this->res,$this->privateKey , null, $this
        ->generatorConfig);

        if (empty($this->privateKey)) {
            throw new Exception('生成私钥失败');
        }
    }

    /**
     * @throws Exception
     */
    protected function generatePublicKey()
    {
        $resKey = openssl_pkey_get_details($this->res);

        if (empty($resKey['key'])) {
            throw new Exception('生成公钥失败');
        }

        $this->publicKey = $resKey['key'];
    }

    /**
     * 生成公钥与密钥文件
     * @throws Exception
     */
    public function generate()
    {
        $this->generatePublicKey();

        $this->generatePrivateKey();

        file_put_contents(__DIR__."/public_test.pem", $this->publicKey);

        file_put_contents(__DIR__."/private_test.pem", $this->privateKey);

        openssl_free_key($this->res);
    }
}


