<?php

session_start();

include "../connection.php";

if (isset($_POST["logout"])) {
    session_destroy();
}

if ((isset($_SESSION["loggedin"]) &&  $_SESSION["isstudent"] = TRUE && $_SESSION["loggedin"] == TRUE)) {
    echo "<script>" . "window.location.href='./student_dashboard.php'" . "</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/student.css" />

    <link rel="icon" href="../img/logo.png" />
    <title>Login</title>
</head>

<body class="center">
    <img src="../img/Simplification.png" alt="" />

    <form method="post">
        <?php

        if (isset($_POST['login'])) {
            $stuid = $_POST['stuid'];
            $password = $_POST['password'];

            $query = "SELECT * FROM `students` WHERE id = '$stuid'";
            $result = mysqli_query($conn, $query);
            if ($row = mysqli_fetch_assoc($result)) {


                if ($row['password'] == $password) {
                    echo "sucess full login";
                    echo "<script>" . "window.location.href='./student_dashboard.php'" . "</script>";


                    $_SESSION["id"] = $row['id'];
                    $_SESSION["username"] = $row['firstName'];
                    $_SESSION["loggedin"] = TRUE;
                    $_SESSION["isstudent"] = TRUE;
                } else {
                    echo "<div class='error_message' >password is incorrect</div>";
                }
            } else {
                echo "<div class='error_message'>No Student With ID</div>";
            }
        }
        ?>
        <input type="text" name="stuid" placeholder="Your Student Id" />
        <p class="pass_message">
            if You did not chage your password the password is your age + your last
            name example : <b>"2004-01-14haile"</b> , make sure all the letters are
            smallletter
        </p>
        <input type="text" name="password" placeholder="Password" />
        <input type="submit" value="login" name="login" />
        <a href="../index.php">Go home </a>
    </form>
</body>

</html>