<?php

function encryptPrivateKey(
    $privateKey,
    $password
)
{
    $iv = openssl_random_pseudo_bytes(16);

    $encrypted = openssl_encrypt(
        $privateKey,
        'AES-256-CBC',
        $password,
        0,
        $iv
    );

    return [
        'encrypted_data' => $encrypted,
        'iv' => base64_encode($iv)
    ];
}
?>