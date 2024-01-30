<?php include('admin_header.php') ?>
<main>
    <h1 class="text-mid title">Overview dashboard</h1>
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

                <p> <?php echo $rowD['location'] ?></p>
            </div>
        <?php
        }
        ?>
    </section>



</main>

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
        console.log(value);
        let counter = 0
        let circle_size = 472;
        while (!(counter == value)) {
            circle_size -= 4.72;
            circle.style.strokeDashoffset = circle_size;
            counter++



        }


    })
</script>
<?php include('admin_fotter.php') ?>