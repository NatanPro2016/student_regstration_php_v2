<?php include('admin_header.php') ?>
<main class="center">

    <?php
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `id` = '$id'");


    if ($row = mysqli_fetch_assoc($result)) {

    ?>

        <form method="post">
            <?php
            if (isset($_POST["update"])) {

                $id_new = $_POST['id'];
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

                $password = $dob . strtolower($lastname);
                try {
                    $update_query = "UPDATE `students` SET `id` = '$id_new' , `firstName`='$firstname',`middleName`='$middlename',`lastName`='$lastname',`age`=$age,`sex`='$sex',`DOB`='$dob',`depaptment`='$dep',`grade`=$grade,`email`='$email',`password`='$password'  WHERE id='$id' ";

                    $update = mysqli_query($conn, $update_query);
                    if ($update) {
                        echo "<div class='success_message'>updated</div>";
                    } else {
                        echo "cannot update";
                    }
                } catch (Exception $e) {
                    if (strpos($e, "Duplicate entry ")) {
                        echo "<div class='error_message'> ID  DUPLICATION </div>";
                    } else {
                        echo "<div class='error_message'> Something is wrong </div>";
                    }
                }
            }
            ?>
            <div class="input_group">
                <label for="id"> ID</label>
                <input type="text" name="id" value="<?php echo $row['id'] ?>">
            </div>
            <div class="input_group">
                <label for="firstname"> Fist Name</label>
                <input type="text" name="firstname" value="<?php echo $row['firstName'] ?>">
            </div>
            <div class="input_group">
                <label for="middlename"> Middle Name</label>
                <input type="text" name="middlename" value="<?php echo $row['middleName'] ?>">
            </div>
            <div class="input_group">
                <label for="lastname"> Last Name</label>
                <input type="text" name="lastname" value="<?php echo $row['lastName'] ?>">
            </div>
            <div class="input_group">
                <label for="age"> Age</label>
                <input type="number" name="age" value="<?php echo $row['age'] ?>">
            </div>
            <div class="input_group">
                <label for="sex"> sex</label>
                <select name="sex" id="">
                    <option value="F" <?php if ($row['sex'] == 'F') {
                                            echo "selected";
                                        } ?>>Fmaile</option>
                    <option value="M" <?php if ($row['sex'] == 'M') {
                                            echo "selected";
                                        } ?>>Male</option>
                </select>
            </div>
            <div class="input_group">
                <label for="dob"> dob</label>
                <input type="date" name="dob" value="<?php echo $row['DOB'] ?>">
            </div>
            <div class="input_group">
                <label for="grade"> Grade</label>
                <input type="number" name="grade" value="<?php echo $row['grade'] ?>">
            </div>
            <div class="input_group">
                <label for="email"> Email</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>">
            </div>




            <input type="submit" value="update" name="update">
        </form>

    <?php

    }
    ?>

</main>
<?php include('admin_fotter.php') ?>