<?php

session_start();

include "../config/koneksi.php";
include "../crypto/hash.php";

$userId = $_SESSION['user_id'];

$fileName = $_FILES['document']['name'];
$tmpName  = $_FILES['document']['tmp_name'];

$targetPath =
    "../../storage/uploads/" . $fileName;

$fileExt = strtolower(
    pathinfo($fileName, PATHINFO_EXTENSION)
);

$allowed = ['pdf', 'txt'];

if(!in_array($fileExt, $allowed)){

    die("Format file tidak didukung");
}

if(move_uploaded_file($tmpName, $targetPath)){

    $fileHash = generateHash($targetPath);

    $query = mysqli_query($conn,"
        INSERT INTO documents(
            user_id,
            filename,
            file_hash
        )
        VALUES(
            '$userId',
            '$fileName',
            '$fileHash'
        )
    ");

    if($query){

        echo "
            Upload berhasil
            <br><br>

            SHA-256 Hash:
            <br>
            $fileHash
        ";

    }else{

        echo mysqli_error($conn);
    }

}else{

    echo "Upload gagal";
}
?>