<?php

function decryptPrivateKey(
    $encryptedData,
    $password,
    $iv
)

{
    return openssl_decrypt(
        $encryptedData,
        'AES-256-CBC',
        $password,
        0,
        base64_decode($iv)
    );
}
?>

