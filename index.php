<?php
include("connection.php");
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["isadmin"] == TRUE && $_SESSION["loggedin"] == TRUE) {
    echo "<script>" . "window.location.href='./admin/admin_dashboard.php'" . "</script>";
    exit;
}

if ((isset($_SESSION["loggedin"]) &&  $_SESSION["isstudent"] = TRUE && $_SESSION["loggedin"] == TRUE)) {
    echo "<script>" . "window.location.href='./students/student_dashboard.php'" . "</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="icon" href="./img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kolfe college</title>
</head>

<body>
    <nav>
        <a href="#" class="logo">
            <img class="logo_img" src="./img/logo.png" alt="" /></a>
        <ul>
            <li class="active" id="home-nav"><a href="#"> Home </a></li>
            <li id="about-nav"><a href="#about"> About </a></li>
            <li id="find-nav"><a href="#find"> your Department </a></li>
        </ul>
    </nav>
    <section class="hero" id="home">
        <div class="content">
            <h1>Kolfe industrial College</h1>
            <p>
                This website help you to find your department and your result
            </p>
            <p>Use this website if you are registerd on Kolfe industrial college</p>
            <div class="btns">
                <a href="./students/student_login.php" class="btn btn-primary">Get started</a>
                <a href="#find" class="btn btn-outline"><span>check your department</span></a>
            </div>
        </div>
        <img src="./img/hero-bg.png" alt="">

    </section>
    <section class="about" id="about">
        <img src="./img/about.jpg" alt="" />
        <div class="content">
            <p>About Us</p>
            <h1>kolfe industrial college</h1>
            <p>
                Kolfe Industrial College is a renowned Technical and Vocational Education and Training (TVET) institution that was established in 2008E.C. It stands as one of the leading colleges in Ethiopia, offering a diverse range of programs and courses in the field of industrial education. With a commitment to providing high-quality education and training, Kolfe Industrial College has become a hub for students aspiring to excel in various industrial sectors.
            </p>
        </div>
    </section>
    <section class="depts">
        <div class="departments">
            <div class="overflow-hidden" id="scroll">
                <div class="one">
                    <p>Department</p>
                    <h1>Agro</h1>
                    <p>
                        if you have less that <span>60 grade point</span>
                        you will be forced to get in to this department
                    </p>
                </div>
                <div class="two">
                    <p>Department</p>
                    <h1>ICT</h1>
                    <p>
                        you need at least <span>90 grade</span> point to get in to ict
                        department
                    </p>
                </div>
                <div class="three">
                    <p>Department</p>
                    <h1>Garment</h1>
                    <p>
                        if you have less that <span>60 grade point</span> you will be
                        forced to get in to this department
                    </p>
                </div>
                <div class="four">
                    <p>Department</p>
                    <h1>Accounting</h1>
                    <p>
                        you need at least <span> 80 grade point</span> to get in to ict
                        department
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="rotate">
                <div class="icon">
                    <img src="./img/Group 2.png" alt="" class="agro imgs" />
                    <img src="./img/ICT.png" alt="" class="ict imgs" />
                    <img src="./img/garment.png" alt="" class="garment imgs" />
                    <img src="./img/accounting.png" alt="" class="accounting imgs" />
                </div>
            </div>
            <div class="controls">
                <button id="prv"><i class="fa-solid fa-caret-left"></i></button>
                <button id="next"><i class="fa-solid fa-caret-right"></i></button>
            </div>
        </div>
    </section>
    <section class="find" id="find">
        <img src="./img/Illustration - Sport, Outdoor _ fishing, boat, hobby, activity, man, fish, target, win, adventure.png" alt="" />
        <div class="form">
            <form method="post">
                <h2>Find yourself by your register id</h2>
                <input type="text" name="id" placeholder="Your id " required />
                <input type="submit" name="search" value="find yourself " class="btn btn-primary" />
                <?php
                if (isset($_POST['search'])) {
                    $id = $_POST['id'];
                    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `id`= '$id'");
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='result'>";
                        echo "<div class='row'> <p>Full name </p> <p>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</p> </div>";
                        $depid = $row['depaptment'];
                        $department = "SELECT * FROM `department` WHERE `id` = '$depid'";
                        $res = mysqli_query($conn, $department);
                        if ($rowD = mysqli_fetch_assoc($res)) {
                            echo "<div class='row'> <p> Dep Name </p> <p> " . $rowD["Name"] . "</p> </div>" . " <div class='row'> <p> Location </p> <p>" . $rowD["location"] . "</p> </div>";
                            echo "<script>" . "window.location.href='./index.php#find'" . "</script>";
                        }
                        echo "</div>";
                    } else {
                        echo "<div class='error_message'> No Student With this id</div>";
                        echo "<script>" . "window.location.href='./index.php#find'" . "</script>";
                    }
                }

                ?>

            </form>
        </div>
    </section>
    <footer>
        <div class="map">
            <h2>Main location</h2>
            <a _blank href="https://www.google.com/maps/place/Kolfa+industrial+college/@8.9923577,38.7067382,18.39z/data=!4m6!3m5!1s0x164b8705adf1a59f:0x84112f7c198b4153!8m2!3d8.992278!4d38.707194!16s%2Fg%2F11kjpfycfm?hl=en&entry=ttu">
                <img src="./img/Screenshot from 2024-01-01 23-13-31.png" alt="" />
            </a>
        </div>
        <div class="content">
            <ul>
                <li><b> Email :</b> kolfeindustrialcollege@gmail.com</li>
                <li><b> Phone :</b> +2519 12 12 12 12</li>
                <li><b> Telegram :</b> t.me/kolfecollege</li>
                <li><b> Instagram :</b> instagrm.com/kolfecollege</li>
            </ul>

            <a href="./admin/admin_login.php"> login as admin</a>
        </div>
    </footer>
    <script src="./js/index.js"></script>
</body>

</html>