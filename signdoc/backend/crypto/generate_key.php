<?php
function generateRSAKey()
{
    $config = array(
        "config" => "D:/xampp/php/extras/ssl/openssl.cnf",  
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );
    $resource = openssl_pkey_new($config);
    if (!$resource) {
        while ($msg = openssl_error_string()) {
            echo $msg . "<br>";
        }
        die("Gagal generate RSA key");
    }
    openssl_pkey_export(
        $resource,
        $privateKey,
        null,
        $config
    );
    $publicKey = openssl_pkey_get_details($resource);
    return [
        'private_key' => $privateKey,
        'public_key'  => $publicKey['key']
    ];
}
?>