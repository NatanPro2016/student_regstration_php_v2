<?php include('admin_header.php') ?>
<main class="center">

    <form method="post">
        <?php
        if (isset($_POST['create'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            try {
                $create = mysqli_query($conn, "INSERT INTO `office`(`id`, `Name`, `email`, `password`) VALUES ('$id', '$name', '$email', '$password')");
                if ($create) {
                    echo "<div class='success_message'>created succesfuly </div> ";
                } else {
                    echo "<div class='error_message'>cannot create server error dublicate admin or email </div>  ";
                }
            } catch (Exception $e) {
                if (strpos($e, "Duplicate entry")) {
                    echo "<div class='error_message'> ID  DUPLICATION </div>";
                } elseif (strpos($e, "Duplicate entry 'dage@gmail.com' for key 'unique'")) {
                    echo "<div class='error_message'> Email DUPLICATION </div>";
                } else {

                    echo "<div class='error_message'> Something is wrong </div>";
                }
            }
        }
        ?>

        <label for="id">id</label>
        <input type="text" name="id" placeholder="New ID" required>
        <label for="id">Name</label>
        <input type="text" name="name" placeholder="User Name" required>
        <label for="id">Email</label>
        <input type="email" name="email" placeholder="Email For login" required>
        <label for="id">Password</label>
        <input type="password" name="password" placeholder="Create Password" required>
        <input type="submit" value="create" name="create">
    </form>
</main>
<?php include('admin_fotter.php') ?>