<?php include('admin_header.php') ?>
<main class="center result">
    <?php
    $stuid = $_GET['id'];

    if (isset($_POST['delete'])) {
        $level_delete =  $_POST['level'];
        echo $level_delete;

        $delete = mysqli_query($conn, "DELETE FROM `result` WHERE `student`='$stuid' AND `level` ='$level_delete'");
        if ($delete) {
            echo "<div class='success_message' >delete Sucess fully </div> ";
        }
    }
    if (isset($_POST['update'])) {

        $level_old = $_POST['old_level'];



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
        $result_update = mysqli_query($conn, "UPDATE `result` SET `level`='$level',`uc1`=$uc1,`uc2`=$uc2,`uc3`=$uc3,`uc4`=$uc4,`uc5`=$uc5 ,`uc6`=$uc6,`uc7`=$uc7,`uc8`=$uc8,`uc9`='$uc9',`uc10`=$uc10 WHERE `student`='$stuid' AND `level` ='$level_old'");
        try {
            if ($result_update) {
                echo "<div class='success_message'>updated Sucess fully </div> ";
                echo $level;
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

    <table>
        <tr>
            <th> Level </th>
            <th> UC 1 </th>
            <th> UC 2 </th>
            <th> UC 3 </th>
            <th> UC 4 </th>
            <th> UC 5 </th>
            <th> UC 6 </th>
            <th> UC 7 </th>
            <th> UC 8 </th>
            <th> UC 9 </th>
            <th> UC 10 </th>
        </tr>



        <?php
        $result = mysqli_query($conn, "SELECT * FROM `result` WHERE `student` = '$stuid'");
        while ($row = mysqli_fetch_array($result)) {


        ?>
            <form method="post">


                <tr>
                    <input type="hidden" name="old_level" value="<?php echo $row['level'] ?>">

                    <td> <select name="level" id="">
                            <option value="I" <?php if ($row['level'] == 'I') {
                                                    echo "selected";
                                                } ?>> level I</option>
                            <option value="II" <?php if ($row['level'] == 'II') {
                                                    echo "selected";
                                                } ?>>level II</option>
                            <option value="III" <?php if ($row['level'] == 'III') {
                                                    echo "selected";
                                                } ?>>level III</option>
                            <option value="IV" <?php if ($row['level'] == 'IV') {
                                                    echo "selected";
                                                } ?>>level IV</option>


                        </select></td>
                    <td> <input type="text" name="uc1" value=" <?php echo $row['uc1'] ?> "></td>
                    <td> <input type="text" name="uc2" value=" <?php echo $row['uc2'] ?> "></td>
                    <td> <input type="text" name="uc3" value=" <?php echo $row['uc3'] ?> "></td>
                    <td> <input type="text" name="uc4" value=" <?php echo $row['uc4'] ?> "></td>
                    <td> <input type="text" name="uc5" value=" <?php echo $row['uc5'] ?> "></td>
                    <td> <input type="text" name="uc6" value=" <?php echo $row['uc6'] ?> "></td>
                    <td> <input type="text" name="uc7" value=" <?php echo $row['uc7'] ?> "></td>
                    <td> <input type="text" name="uc8" value=" <?php echo $row['uc8'] ?> "></td>
                    <td> <input type="text" name="uc9" value=" <?php echo $row['uc9'] ?> "></td>
                    <td> <input type="text" name="uc10" value=" <?php echo $row['uc10'] ?> "></td>
                    <td> <input type="submit" value=" edit " name="update" id="update" style="display: none;"><label for="update"><i class='fa-solid fa-pencil'></i></label> </td>
                    <td>
                        <form method="post"> <select name="level" id="" style="display: none;">
                                <option value="<?php echo $row['level'] ?>" style="display: none;"></option>
                            </select> <input type="submit" value="delete" name="delete" id="submit" style="display: none;"> <label for="submit"> <i class='fa-solid fa-trash'></i></label></form>
                    </td>
                </tr>
            </form>



        <?php
        }
        ?>

    </table>
    <a href="admin_student_add_result.php?id=<?php echo $stuid ?>"> add result </a>
    <a href="admin_dashboard.php"> go back to admin </a>





</main>
<?php include('admin_fotter.php') ?>