<?php include('admin_header.php') ?>
<main>
    <h1 class=" text-mid title">Overview dashboard</h1>
    <section class="depts">
        <?php
        $department = mysqli_query($conn, "SELECT * FROM `department`");
        while ($rowD = mysqli_fetch_assoc($department)) {
        ?>

            <div class="card">
                <h5 class="text-muted"><?php echo $rowD['id'] ?></h5>
                <h2><?php
                    $id_dep =  $rowD['id'];

                    $count = mysqli_query($conn, "SELECT COUNT(id) FROM `students` WHERE depaptment = '$id_dep'");
                    $value = mysqli_fetch_assoc($count);
                    echo $value['COUNT(id)'];

                    ?></h2>
                <div class="indecator">
                    <div class="inner">
                        <div id="number">
                            <?php
                            $count_all = mysqli_query($conn, "SELECT COUNT(id) FROM `students` ");
                            $value_all = mysqli_fetch_assoc($count_all);
                            if ($value_all['COUNT(id)'] == 0) {
                                echo 0;
                            } else {

                                echo  $value['COUNT(id)'] / $value_all['COUNT(id)']  * 100;
                            } ?>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                        <defs>
                            <linearGradient id="GradientColor">
                                <stop offset="0%" stop-color="#e91e63" />
                                <stop offset="100%" stop-color="#673ab7" />
                            </linearGradient>
                        </defs>
                        <circle id="circle" cx="80" cy="80" r="70" stroke-linecap="round" />
                    </svg>
                </div>

                <h2><?php echo $rowD['Name'] ?></h2>
            </div>
        <?php
        }
        ?>
    </section>

    <section class="students">

        <div class="flex">
            <h1 class="text-mid title">Students</h1>
            <form method="post">
                <input type="text" placeholder="search student by Id" name="id">
                <input type="submit" value="Search" name="search">
            </form>


        </div>
        <?php
        if (isset($_POST["search"])) {
            $id = $_POST['id'];
            $res_stu = mysqli_query($conn,  "SELECT * FROM `students` WHERE `id` = '$id'");

        ?>
            <table>
                <tr class="tr">
                    <th> ID </th>
                    <th> Name </th>
                    <th> Age </th>
                    <th> Sex </th>
                    <th> Email</th>
                    <th> Grade </th>
                    <th> DOB </th>
                    <th> Department </th>
                </tr>
                <?php
                while ($rowS = mysqli_fetch_assoc($res_stu)) {
                ?>
                    <tr class="tr">
                        <td><?php echo $rowS['id']  ?></td>
                        <td><?php echo $rowS['firstName'] . " " . $rowS['middleName'] . " " . $rowS['lastName']; ?> </td>
                        <td><?php echo $rowS['age']  ?></td>
                        <td><?php echo $rowS['sex']  ?></td>
                        <td><?php echo $rowS['email']  ?></td>
                        <td><?php echo $rowS['grade']  ?></td>
                        <td><?php echo $rowS['DOB']  ?></td>

                        <?php
                        $department = $rowS['depaptment'];
                        $dep = mysqli_query($conn, "SELECT * FROM `department` where id = '$department'");
                        if ($dep_row = mysqli_fetch_assoc($dep)) {
                            echo "<td>" . $dep_row["Name"] . "</td>";
                        }

                        ?>
                        <td> <a href="admin_edit_student.php?id=<?php echo $rowS['id'] ?>"> <i class="fa-solid fa-pencil"></i> <span id="edit">edit </span></a> </td>
                        <td>
                            <form action="admin_delete_student.php" method="POST" id="confirm_form">
                                <input type="hidden" name="id" value="<?php echo $rowS['id'] ?>">
                                <input type="submit" value="Delete" name="delete" id="delete">
                                <label for="delete"><i class="fa-solid fa-trash"></i></label>
                            </form>
                        </td>
                        <td> <a href="admin_student_result.php?id=<?php echo $rowS['id'] ?>">Resut</a> </td>

                    </tr>
            </table>

        <?php
                }
            } else {



        ?>


        <table>
            <tr class="tr">
                <th> ID </th>
                <th> Name </th>
                <th> Age </th>
                <th> Sex </th>
                <th> Email</th>
                <th> Grade </th>
                <th> DOB </th>
                <th> Department </th>
            </tr>

            <?php

                $res_stu = mysqli_query($conn,  "SELECT * FROM `students`, `department` WHERE students.stduent ");
                while ($rowS = mysqli_fetch_assoc($res_stu)) {
            ?>
                <tr class="tr">
                    <td><?php echo $rowS['id']  ?></td>
                    <td><?php echo $rowS['firstName'] . " " . $rowS['middleName'] . " " . $rowS['lastName']; ?> </td>
                    <td><?php echo $rowS['age']  ?></td>
                    <td><?php echo $rowS['sex']  ?></td>
                    <td><?php echo $rowS['email']  ?></td>
                    <td><?php echo $rowS['grade']  ?></td>
                    <td><?php echo $rowS['DOB']  ?></td>

                    <?php
                    $department = $rowS['depaptment'];
                    $dep = mysqli_query($conn, "SELECT * FROM `department` where id = '$department'");
                    if ($dep_row = mysqli_fetch_assoc($dep)) {
                        echo "<td>" . $dep_row["Name"] . "</td>";
                    }

                    ?>
                    <td> <a href="admin_edit_student.php?id=<?php echo $rowS['id'] ?>"> <i class="fa-solid fa-pencil"></i> <span id="edit">edit </span></a> </td>
                    <td>
                        <form action="admin_delete_student.php" method="POST" id="confirm_form">
                            <input type="hidden" name="id" value="<?php echo $rowS['id'] ?>">
                            <input type="submit" value="Delete" name="delete" id="delete">
                            <label for="delete"><i class="fa-solid fa-trash"></i></label>
                        </form>
                    </td>
                    <td> <a href="admin_student_result.php?id=<?php echo $rowS['id'] ?>">Resut</a> </td>

                </tr>
        <?php
                }
            }

        ?>


        </table>
    </section>

    <script>
        let numbers = document.querySelectorAll("#number")
        let circles = document.querySelectorAll("#circle")
        let values = []
        numbers.forEach(number => {


            let value = parseInt(number.innerHTML);
            values.push(value)
            let counter = 0;
            setInterval(() => {
                if (counter == value) {
                    clearInterval();
                } else {
                    counter++;
                    number.innerHTML = counter + "%";
                }
            }, 20);


        })
        let current_value = -1
        circles.forEach(async (circle) => {
            current_value++
            value = values[current_value];

            let counter = 0
            let circle_size = 472;
            while (!(counter == value)) {
                circle_size -= 4.72;
                circle.style.strokeDashoffset = circle_size;
                counter++
            }


        })
    </script>
</main>
<?php include('admin_fotter.php') ?>