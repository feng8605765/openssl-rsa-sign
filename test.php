
<?php

require __DIR__.'/autoload.php';

try {
//    $generator = new KeyGenerator();
//    $generator->generate();
//
//    exit;

//    $cer = new Certificate();
//    $cer->generate();
//    exit;

     $sign = new Sign();
     $signMsg = $sign->encrypted(123456);

     $sign->decrypted($signMsg, 123456);
     exit;

} catch (Throwable $e) {
    print_r($e);
}


