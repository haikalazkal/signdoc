<!DOCTYPE html>
<html>
<head>

    <title>Register SignDoc</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<div class="container">

    <h2>Register SignDoc</h2>

    <form action="../../backend/auth/proses_registrasi.php"
          method="POST">

        <div class="input-group">

            <input type="text"
                   name="nama"
                   placeholder="Nama Lengkap"
                   required>

        </div>

        <div class="input-group">

            <input type="email"
                   name="email"
                   placeholder="Email"
                   required>

        </div>

        <div class="input-group">

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

        </div>

        <button type="submit">
            Register
        </button>

    </form>

    <div class="link">

        Sudah punya akun?
        <a href="login.php">
            Login
        </a>

    </div>

</div>

</body>
</html>