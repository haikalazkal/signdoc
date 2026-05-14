<?php

function signDocument(
    $hash,
    $privateKey
)
{
    openssl_sign(
        $hash,
        $signature,
        $privateKey,
        OPENSSL_ALGO_SHA256
    );

    return base64_encode($signature);
}
?>