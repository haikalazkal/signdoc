<?php

function verifySignature(
    $hash,
    $signature,
    $publicKey
)
{
    $result = openssl_verify(
        $hash,
        base64_decode($signature),
        $publicKey,
        OPENSSL_ALGO_SHA256
    );

    return $result;
}
?>