<?php

session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["isadmin"] == TRUE && $_SESSION["loggedin"] == TRUE)) {
    echo "<script>" . "window.location.href='./admin_login.php'" . "</script>";
    exit;
}

$username = $_SESSION['username'];
