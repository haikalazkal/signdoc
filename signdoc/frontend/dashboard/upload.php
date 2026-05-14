<?php

include "../../backend/auth/session.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Dokumen</title>
</head>
<body>

<h2>Upload Dokumen</h2>

<form action="../../backend/proses/upload_proses.php"
      method="POST"
      enctype="multipart/form-data">

    <input type="file"
           name="document"
           required>

    <br><br>

    <button type="submit">
        Upload
    </button>

</form>

<br>

<a href="dashboard.php">
    Kembali ke Dashboard
</a>

</body>
</html>