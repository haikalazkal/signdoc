<!DOCTYPE html>
<html>
<head>

    <title>Login SignDoc</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<div class="container">

    <h2>Login SignDoc</h2>

    <form action="../../backend/auth/proses_login.php"
          method="POST">

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
            Login
        </button>

    </form>

    <div class="link">

        Belum punya akun?
        <a href="register.php">
            Register
        </a>

    </div>

</div>

</body>
</html>