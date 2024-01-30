<?php
include("../connection.php");


include('./admin_control.php');
$username = $_SESSION["username"];



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Creepster&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    /> -->
    <link rel="icon" href="../img/logo.png" />
</head>

<body>
    <nav class="nav nav-top">
        <div class="logo">
            <a href="admin_dashboard.php"> Kolfe college</a>
        </div>
        <div id="bars"> <i class="fa-solid fa-bars"></i></div>
        <div class="user">
            <i class="fa-solid fa-user"></i>
            <?php echo $username; ?>
        </div>
    </nav>
    <nav class="nav side-nav" id="side-nav">

        <ul>
            <li id="nav-link">
                <span>
                    <i class="fa-solid fa-house"></i>
                </span>
                <a href="./admin_dashboard.php">Home </a>
            </li>
            <li id="nav-link">
                <span> <i class="fa-solid fa-book"></i></span>
                <a href="./admin_departments.php">Departments </a>
            </li>
            <li id="nav-link">
                <span> <i class="fa-solid fa-user-plus"></i></span><a href="./admin_register_student.php">Register Student </a>
            </li>
            <li id="nav-link">
                <span><i class="fa-solid fa-user-tie"></i></span>
                <a href="./admin_add_admin.php">Create New admin </a>
            </li>
        </ul>
        <div class="user">
            <i class="fa-solid fa-user"></i>
            <?php echo $username; ?>
        </div>
        <ul class="light">
            <li><i class="fa-solid fa-right-from-bracket"></i>
                <form action="admin_login.php" method="post" id="confirm_form">
                    <input type="submit" value="logout" name="logout" />
                </form>
            </li>
            <li>
                <i class="fa-solid fa-gear"></i><a href="admin_change_password.php"> change password </a>
            </li>
            <li><i class="fa-solid fa-user-xmark" style="color:red"></i>
                <form action="admin_login.php" method="post" id="confirm_form">
                    <input type="submit" value="Delete and logout" name="delete_logout" />
                </form>
            </li>
        </ul>
    </nav>