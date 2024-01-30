<?php include('admin_header.php') ?>
<main class="center">

    <form method="post">
        <?php
        $stuid = $_GET['id'];
        if (isset($_POST['create'])) {
            $level = $_POST['level'];
            $uc1 = $_POST['uc1'];
            $uc2 = $_POST['uc2'];
            $uc3 = $_POST['uc3'];
            $uc4 = $_POST['uc4'];
            $uc5 = $_POST['uc5'];
            $uc6 = $_POST['uc6'];
            $uc7 = $_POST['uc7'];
            $uc8 = $_POST['uc8'];
            $uc9 = $_POST['uc9'];
            $uc10 = $_POST['uc10'];



            try {
                $query_add = "INSERT INTO `result`( `student`, `level`, `uc1`, `uc2`, `uc3`, `uc4`, `uc5`, `uc6`, `uc7`, `uc8`, `uc9`, `uc10`) VALUES ('$stuid','$level',$uc1,$uc2, $uc3, $uc4, $uc5, $uc6, $uc7, $uc8, $uc9, $uc10 )";

                $add_result = mysqli_query($conn, $query_add);
                if ($add_result) {
                    echo "<div class='success_message'>inserted successfull </div>";
                }
            } catch (Exception $e) {
                if (strpos($e, " Duplicate entry")) {
                    echo "<div class='error_message'> one level can have only one result  </div>";
                } else {
                    echo "<div class='error_message'> Something is wrong </div>";
                }
            }
        }
        ?>

        <label for="level">Level</label>
        <select name="level" id="">
            <option value="I"> LEVEL I</option>
            <option value="II"> LEVEL II</option>
            <option value="IV"> LEVEL IV</option>
            <option value="V"> LEVEL V</option>
        </select>
        <label for="uc1">UC 1</label>
        <input type="number" name="uc1" id="">
        <label for="uc1">UC 2</label>
        <input type="number" name="uc2" id="">
        <label for="uc1">UC 3</label>
        <input type="number" name="uc3" id="">
        <label for="uc1">UC 4</label>
        <input type="number" name="uc4" id="">
        <label for="uc1">UC 5</label>
        <input type="number" name="uc5" id="">
        <label for="uc1">UC 6</label>
        <input type="number" name="uc6" id="">
        <label for="uc1">UC 7</label>
        <input type="number" name="uc7" id="">
        <label for="uc1">UC 8</label>
        <input type="number" name="uc8" id="">
        <label for="uc1">UC 9</label>
        <input type="number" name="uc9" id="">
        <label for="uc1">UC 10</label>
        <input type="number" name="uc10" id="">


        <input type="submit" value="add" name="create">
        <a href="admin_student_result.php?id=<?php echo $stuid ?>"> go back</a>
    </form>
</main>
<?php include('admin_fotter.php') ?>