<?php

include "../../backend/auth/session.php";
include "../../backend/config/koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM documents"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Document</title>
</head>
<body>

<h2>Sign Document</h2>

<form action="../../backend/proses/sign_proses.php"
      method="POST">

    <select name="document_id" required>

        <option value="">
            -- Pilih Dokumen --
        </option>

        <?php while($doc = mysqli_fetch_assoc($query)){ ?>

            <option value="<?= $doc['id']; ?>">

                <?= $doc['filename']; ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Masukkan Password"
           required>

    <br><br>

    <button type="submit">
        Sign Document
    </button>

</form>

</body>
</html>