<?php 

include "../../backend/auth/session.php";

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<div class="dashboard-container">

    <h2>Dashboard SignDoc</h2>

    <p class="welcome-text">

        Selamat Datang,

        <b>
            <?php echo $_SESSION['nama']; ?>
        </b>

    </p>

    <div class="menu">

        <a href="upload.php">

            <button>
                Upload Dokumen
            </button>

        </a>

        <a href="history.php">

            <button>
                Riwayat Dokumen
            </button>

        </a>

        <a href="verify.php">

            <button>
                Verifikasi Dokumen
            </button>

        </a>

        <a href="../auth/logout.php">

            <button class="logout-btn">
                Logout
            </button>

        </a>

    </div>

</div>

</body>
</html>