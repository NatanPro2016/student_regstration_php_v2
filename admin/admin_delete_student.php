<?php include('admin_header.php') ?>
<main class="center">
    <?php


    if (isset($_POST["delete"])) {

        $id = $_POST['id'];
        echo $id;

        try {
            $delete = mysqli_query($conn, "DELETE FROM `students` WHERE id='$id'");
            if ($delete) {
                echo "<div class='sucess_message'>Deleted Suceefully Deleted </div>";
            } else {
                echo "<div class= 'error_message'>Cannot delete  delete the results first </div> ";
            }
        } catch (Exception $e) {
            if (strpos($e, "a foreign key constraint fails")) {
                echo "<div class='error_message'> Delete the results first </div>";
            } else {
                echo "<div class='error_message'> Something is wrong </div>";
            }
        }
    }
    echo "<a href='admin_dashboard.php'class='btn'> go back  </a>";
    ?>
</main>
<?php include('admin_fotter.php') ?>