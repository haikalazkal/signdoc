<?php

$res = openssl_pkey_new([
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
]);

var_dump($res);

echo "<br><br>";

while ($msg = openssl_error_string()) {
    echo $msg . "<br>";
}

?>