<?php

session_start();

include "../config/koneksi.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'"
);

$user = mysqli_fetch_assoc($query);

if($user){

    if(password_verify($password, $user['password'])){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama']    = $user['nama'];

        header("Location: ../../frontend/dashboard/dashboard.php");

    } else {

        echo "Password salah";
    }

} else {

    echo "User tidak ditemukan";
}
?>