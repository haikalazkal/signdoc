<?php

session_start();

include "../config/koneksi.php";

include "../crypto/deskripsi.php";
include "../crypto/sign_dokumen.php";

$userId = $_SESSION['user_id'];

$documentId = $_POST['document_id'];
$password   = $_POST['password'];

$docQuery = mysqli_query(
    $conn,
    "SELECT * FROM documents
     WHERE id='$documentId'"
);

$document = mysqli_fetch_assoc($docQuery);

$keyQuery = mysqli_query(
    $conn,
    "SELECT * FROM user_keys
     WHERE user_id='$userId'"
);

$keyData = mysqli_fetch_assoc($keyQuery);

$privateKey = decryptPrivateKey(
    $keyData['encrypted_private_key'],
    $password,
    $keyData['iv']
);

if(!$privateKey){

    die("Password salah / decr
    ypt gagal");
}

$signature = signDocument(
    $document['file_hash'],
    $privateKey
);

$query = mysqli_query($conn,"
    INSERT INTO signatures(
        document_id,
        signature_data
    )
    VALUES(
        '$documentId',
        '$signature'
    )
");

if($query){

    echo "
        Dokumen berhasil ditandatangani
        <br><br>

        Signature:
        <br>
        $signature
    ";

}else{

    echo mysqli_error($conn);
}
?>