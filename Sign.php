<?php

class Sign
{
    /**
     * 私钥加秘
     * @return string
     * @throws Exception
     */
    public function encrypted()
    {
        $pfxPath = __DIR__.'/'.Config::$pfxpath;

        if (! file_exists($pfxPath)) {
            throw new Exception('文件不存在');
        }
        $privKey = file_get_contents($pfxPath);

        $data = 'php是世界上最好的语言';

        openssl_pkcs12_read($privKey, $certs, Config::$privateKeypass);

        $privKeyId = $certs['pkey'];

        openssl_sign($data, $sign, $privKeyId, OPENSSL_ALGO_SHA1);

        return base64_encode($sign);
    }

    /**
     * 公钥解密
     * @param string $sign
     * @throws Exception
     */
    public function decrypted(string $sign)
    {
        $data = 'php是世界上最好的语言';

        $unsign = base64_decode($sign);

//        $pfxPath = __DIR__.'/'.Config::$pfxpath;
//        if (! file_exists($pfxPath)) {
//            throw new Exception('文件不存在');
//        }

//        $privkey = file_get_contents($pfxPath);
//        openssl_pkcs12_read($privkey,$certs, Config::$privateKeypass);
//        $publickId = $certs['cert'];
//        $flag = (bool)openssl_verify($text, $sign, $pubKeyId);

        $cerPath = __DIR__.'/'.Config::$cerpath;
        $publicKey = file_get_contents($cerPath);
        if (! file_exists($cerPath)) {
            throw new Exception('不存在');
        }
        $pubKeyId = openssl_get_publickey($publicKey);

        $flag = (bool)openssl_verify($data, $unsign, $pubKeyId,OPENSSL_ALGO_SHA1);

        echo $flag ?  '证书验证成功'.PHP_EOL : '证书验证失败'.PHP_EOL;
    }
}