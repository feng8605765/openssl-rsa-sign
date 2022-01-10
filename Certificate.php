<?php

class Certificate
{
    private $privateKeypass = "123456";

    private $expireDays = 365;

    protected $dn = array(
        "countryName" => "ZG",                                  //所在国家
        "stateOrProvinceName" => "Guangdong",                    //所在省份
        "localityName" => "Guangzhou",                        //所在城市
        "organizationName" => "The Brain Room Limited",         //注册人姓名
        "organizationalUnitName" => "PHP Documentation Team",   //组织名称
        "commonName" => "Wez Furlong",                          //公共名称
        "emailAddress" => "123456@qq.com"                     //邮箱
    );

    /**
     * @param string $privateKey
     */
    public function generate()
    {
        $privateKey = file_get_contents(__DIR__.'/'.Config::$pripem);

        $csr = openssl_csr_new($this->dn, $privateKey, Config::$config);

        $sscert = openssl_csr_sign($csr, null, $privateKey, $this->expireDays, Config::$config);
        openssl_x509_export($sscert, $csrkey);
        openssl_pkcs12_export($sscert, $prikey, $privateKey, $this->privateKeypass);

        $cerpath = __DIR__.'/'.Config::$cerpath;
        $pfxpath = __DIR__.'/'.Config::$pfxpath;

        file_put_contents($cerpath,$csrkey);
        file_put_contents($pfxpath, $prikey);
    }
}