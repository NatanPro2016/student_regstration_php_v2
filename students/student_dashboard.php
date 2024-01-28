<?php
session_start();
include("../connection.php");


if (!(isset($_SESSION["loggedin"]) &&  $_SESSION["isstudent"] = TRUE && $_SESSION["loggedin"] == TRUE)) {
    echo "<script>" . "window.location.href='./student_login.php'" . "</script>";
    exit;
}

$stuid = $_SESSION["id"];
$name =  $_SESSION["username"];
$query = "SELECT * FROM `students` WHERE id = '$stuid'";
$result = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='student' id ='student'>";
    echo "<div class='row'> <p> your full name </p> <p>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</p> </div>";
    $depid = $row['depaptment'];
    $department = "SELECT * FROM `department` WHERE `id` = '$depid'";
    $res = mysqli_query($conn, $department);
    if ($rowD = mysqli_fetch_assoc($res)) {
        echo "<div class='row'> <p> Dep Name </p> <p> " . $rowD["Name"] . "</p> </div>" . " <div class='row'> <p> Location </p> <p>" . $rowD["location"] . "</p> </div>";
    }
    echo "</div>";
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../img/logo.png" />
    <title>Result</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles/student_dashboard.css" />
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <div class="user" id="user">
                <i class="fa-solid fa-user"></i>
                <i class="fa-solid fa-x"></i>
                <?php echo $_SESSION["username"]; ?>
            </div>
            <form method="post" action="student_login.php" id="form_action">
                <input type="submit" value="logout" name="logout" />
            </form>
        </section>
        <section class="table__body">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `result` WHERE `student` = '$stuid'");
            if ($row = mysqli_fetch_array($result)) {
            ?>
                <table>
                    <tr>
                        <th>Level</th>
                        <th>UC 1</th>
                        <th>UC 2</th>
                        <th>UC 3</th>
                        <th>UC 4</th>
                        <th>UC 5</th>
                        <th>UC 6</th>
                        <th>UC 7</th>
                        <th>UC 8</th>
                        <th>UC 9</th>
                        <th>UC 10</th>
                    </tr>

                    <?php
                    $res1 = mysqli_query($conn, "SELECT * FROM `result` WHERE `student` = '$stuid'");
                    while ($row = mysqli_fetch_assoc($res1)) {
                    ?>
                        <tr>
                            <td><?php echo $row['level'] ?></td>
                            <td><?php echo $row['uc1'] ?></td>
                            <td><?php echo $row['uc2'] ?></td>
                            <td><?php echo $row['uc3'] ?></td>
                            <td><?php echo $row['uc4'] ?></td>
                            <td><?php echo $row['uc5'] ?></td>
                            <td><?php echo $row['uc6'] ?></td>
                            <td><?php echo $row['uc7'] ?></td>
                            <td><?php echo $row['uc8'] ?></td>
                            <td><?php echo $row['uc9'] ?></td>
                            <td><?php echo $row['uc10'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php
            } else {
                echo "<h1> No result added yet </h1>";
            }
            ?>

        </section>
    </main>
    <script>
        const form_actions = document.querySelectorAll("#form_action");

        form_actions.forEach((form_action) => {
            form_action.addEventListener("submit", (e) => {
                if (confirm("Are you sure to do this task") == false) {
                    e.preventDefault();
                }
            });
        });
        const user = document.getElementById('user');
        const student = document.getElementById("student")
        user.addEventListener("click", () => {
            student.classList.toggle('active')
            user.classList.toggle('active')
        })
    </script>
</body>

</html>