<?php

error_reporting(E_ALL);

include "../config/koneksi.php";

include "../crypto/generate_key.php";
include "../crypto/enkripsi.php";

$nama     = trim($_POST['nama']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

if(empty($nama) || empty($email) || empty($password)){
    die("Semua field wajib diisi");
}

$check = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email='$email'"
);

if(mysqli_num_rows($check) > 0){
    die("Email sudah digunakan");
}

$passwordHash = password_hash(
    $password,
    PASSWORD_BCRYPT
);

$queryUser = mysqli_query($conn,"
    INSERT INTO users(
        nama,
        email,
        password
    )
    VALUES(
        '$nama',
        '$email',
        '$passwordHash'
    )
");

if(!$queryUser){
    die("Gagal insert user : "
        . mysqli_error($conn));
}

$userId = mysqli_insert_id($conn);

$keyPair = generateRSAKey();

if(!$keyPair){
    die("Generate RSA gagal");
}

$privateKey = $keyPair['private_key'];
$publicKey  = $keyPair['public_key'];

$encrypted = encryptPrivateKey(
    $privateKey,
    $password
);

if(!$encrypted){
    die("Encrypt private key gagal");
}

$queryKey = mysqli_query($conn,"
    INSERT INTO user_keys(
        user_id,
        public_key,
        encrypted_private_key,
        iv
    )
    VALUES(
        '$userId',
        '".$publicKey."',
        '".$encrypted['encrypted_data']."',
        '".$encrypted['iv']."'
    )
");

if(!$queryKey){
    die("Gagal insert key : "
        . mysqli_error($conn));
}

if(!$queryKey){
    die(mysqli_error($conn));
}

header(
    "Location: ../../frontend/auth/login.php"
);

exit;

?>