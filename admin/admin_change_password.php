<?php include('admin_header.php') ?>
<main class="center">

    <form method="post">
        <?php
        if (isset($_POST['edit'])) {
            $id = $_SESSION['id'];
            $password = $_POST['password'];
            $edit = mysqli_query($conn, "UPDATE `office` SET `password` = '$password' WHERE `id` = '$id'");
            if ($edit) {
                echo "<div class='success_message'> Password Changed </div> ";
            }
        }
        ?>
        <?php echo "<div class='fake_input'>" . $username . "</div>" ?>

        <input type="password" name="password" placeholder="New password ">
        <input type="submit" name="edit" value="Change password ">
    </form>

</main>

<?php include('admin_fotter.php') ?>