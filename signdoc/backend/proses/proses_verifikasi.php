<?php

include "../config/koneksi.php";

include "../crypto/hash.php";
include "../crypto/verify_signature.php";

$documentId = $_POST['document_id'];

$query = mysqli_query($conn,"
    SELECT
        documents.*,
        signatures.signature_data,
        user_keys.public_key
    FROM documents

    JOIN signatures
    ON documents.id = signatures.document_id

    JOIN user_keys
    ON documents.user_id = user_keys.user_id

    WHERE documents.id='$documentId'
");

$data = mysqli_fetch_assoc($query);

$filePath = "../../storage/uploads/" . $data['filename'];

$newHash = generateHash($filePath);

$result = verifySignature(
    $newHash,
    $data['signature_data'],
    $data['public_key']
);

if($result == 1){

    echo "VALID";

}else{

    echo "INVALID";
}
?>