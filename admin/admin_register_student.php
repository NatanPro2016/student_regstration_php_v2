<?php include('admin_header.php') ?>
<main class="center">
    <form method="post">
        <?php

        if (isset($_POST['register'])) {
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $dob = $_POST['dob'];
            $grade = $_POST['grade'];
            $email = $_POST['email'];

            if ($grade >= 90) {
                $dep = "d001";
            } else if ($grade >= 80) {
                $dep = "d002";
            } else if ($grade >= 60) {
                $dep = "d003";
            } else {
                $dep = "d004";
            }
            $password = strtolower($dob . $lastname);

            try {

                $query = "INSERT INTO `students`(`id`, `firstName`, `middleName`, `lastName`, `age`, `sex`, `DOB`, `depaptment`, `grade`, `email`, `password`) 
                    VALUES ('$id','$firstname','$middlename','$lastname','$age','$sex','$dob','$dep','$grade','$email','$password')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<div class='success_message'> inserted sucessfully </div> ";
                    $desplay = "SELECT * FROM `department` WHERE id = '$dep' ";
                    $result = mysqli_query($conn, $desplay);
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='success_message'>Your department is Name  " . $row['Name'] . "</div>";
                        echo "<div class='success_message'>our department is Location  " . $row['location'] . "</div>";
                    }
                } else {
                    echo "not insted ";
                }
            } catch (Exception $e) {
                if (strpos($e, "Duplicate entry")) {
                    echo "<div class='error_message'> ID  DUPLICATION </div>";
                } else {
                    echo "<div class='error_message'> Something is wrong </div>";
                }
            }
        }
        ?>

        <div class="input_group">
            <label for="id"> ID</label>
            <input type="text" name="id" required>
        </div>
        <div class="input_group">
            <label for="firstname"> First Name</label>
            <input type="text" name="firstname" required>
        </div>
        <div class="input_group">
            <label for="middlename"> Middle Name</label>
            <input type="text" name="middlename" required>
        </div>
        <div class="input_group">
            <label for="lastname"> Last Name</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="input_group">
            <label for="age"> Age</label>
            <input type="number" name="age" required>
        </div>
        <div class="input_group">
            <label for="sex"> sex</label>
            <select name="sex" id="">
                <option value="M">Male</option>
                <option value="F">Fmaile</option>
            </select>
        </div>
        <div class="input_group">
            <label for="dob"> dob</label>
            <input type="date" name="dob" required>
        </div>
        <div class="input_group">
            <label for="grade"> Grade</label>
            <input type="number" name="grade" required>
        </div>
        <div class="input_group">
            <label for="email"> Email</label>
            <input type="email" name="email" required>
        </div>


        <input type="submit" value="register" name="register">



    </form>





</main>
<?php include('admin_fotter.php') ?>