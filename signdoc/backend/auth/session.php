<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../../frontend/auth/login.php");
}
?>