<?php

require __DIR__.'/autoload.php';

try {

    if (! isset($argv[1])) {
        // 使用默认的证书做验证
        $sign = new Sign();
        $signMsg = $sign->encrypted();
        $sign->decrypted($signMsg);
        exit;
    }

    if (! in_array($argv[1], ['key', 'cer', 'sign'])) {
        throw new Exception('参数错误');
    }

    switch ($argv[1]) {
        case 'key':
            $generator = new KeyGenerator();  // 生成密钥
            $generator->generate();
            echo '生成密钥成功'.PHP_EOL;
            break;
        case 'cer':
            $cer = new Certificate(); // 生成证书
            $cer->generate();
            echo '生成证书成功'.PHP_EOL;
            break;
        default:
            $sign = new Sign();
            $signMsg = $sign->encrypted(); // 验证
            $sign->decrypted($signMsg);
            break;

    }
} catch (Throwable $e) {
    var_dump($e);
}


