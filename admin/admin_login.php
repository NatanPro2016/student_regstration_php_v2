<?php
session_start();

include "../connection.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Login</title>
</head>

<body class="center">


    <form method="post">
        <?php


        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = 'SELECT * FROM `office`';
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['email'] == $email) {
                    $found = TRUE;

                    if ($row['password'] == $password) {
                        echo "Sucessfull login";

                        $_SESSION["id"] = $row['id'];
                        $_SESSION["username"] = $row['Name'];
                        $_SESSION["loggedin"] = TRUE;
                        $_SESSION["isadmin"] = TRUE;
                        echo "<script>" . "window.location.href='./admin_dashboard.php'" . "</script>";
                    } else {
                        echo "<div class='error_message' >password is incorrect </div>";
                    }
                    break;
                } else {
                    $found = FALSE;
                }
            }
            if (!$found) {
                echo "<div class='error_message' >No user With email </div>";
            }
        }
        if (isset($_POST["logout"])) {
            session_destroy();
        }
        if (isset($_POST["delete_logout"])) {
            $id = $_SESSION["id"];
            $delete = mysqli_query($conn, "DELETE FROM `office` WHERE `id`= '$id'");
            session_destroy();
        }

        if (isset($_SESSION["loggedin"]) && $_SESSION["isadmin"] == TRUE && $_SESSION["loggedin"] == TRUE) {
            echo "<script>" . "window.location.href='./admin_dashboard.php'" . "</script>";
            exit;
        }
        ?>


        <input type="text" name="email" placeholder="You Email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login" name="login">
        <a href="../index.php" class="link">Go home </a>
    </form>

</body>

</html>