<?php include('./components/includes.php'); ?>
<?php include('./connection/global.php'); ?>
<?php include('./connection/functions.php'); ?>

<?php if ($user_type  == 'admin') { ?>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Preloader
            <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->



            <!-- Navbar -->
            <?php include('./components/navbar.php'); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include('./components/sidebar.php'); ?>
            <!-- /.sidebar -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row p-2">
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php
                                        $total = mysqli_query($conn, "SELECT `amount` FROM `wallet` WHERE `email` = '$email'");
                                        $sum = 0;
                                        while ($row = mysqli_fetch_array($total)) {
                                            $amount = $row['amount'];
                                            $sum += (int)$amount;
                                        }
                                        echo $sum;

                                        ?></h3>

                                    <p>Total Income</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php
                                        $total = mysqli_query($conn, "SELECT `username` FROM `user_data`");
                                        echo mysqli_num_rows($total);
                                        ?></h3>

                                    <p>Total Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php
                                        $total = mysqli_query($conn, "SELECT `username` FROM `user_data` WHERE `user_type` = 'sponsor'");
                                        echo mysqli_num_rows($total);
                                        ?></h3>

                                    <p>Total Sponsor</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row p-2">
                        <div class="col-md-6">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header text-white" style="background: url('./assets/dist/img/photo1.png') center center;">
                                    <h3 class="widget-user-username text-right"><?php echo $username ?></h3>
                                    <h5 class="widget-user-desc text-right"><?php echo $email ?></h5>
                                </div>
                                <div class="widget-user-image">
                                    <?php
                                    if ($profile_pic == "") {
                                        echo "<img class='img-circle' src='./assets/dist/img/user3-128x128.jpg' alt='User Avatar'>";
                                    } else {
                                        echo "<img class='img-circle' src='$profile_pic' alt='User Avatar'>";
                                    } ?>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header"><?php if ($active == 1) {
                                                                                    echo "ACTIVE";
                                                                                } else {
                                                                                    echo "IN-ACTIVE";
                                                                                } ?></h5>
                                                <span class="description-text">STATUS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <h5 class="description-header"><?php if ($account_number) {
                                                                                    echo "COMPLETED";
                                                                                } else {
                                                                                    echo "IN-COMPLETE";
                                                                                } ?></h5>
                                                <span class="description-text">PROFILE COMPLETED</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                        <div class="card col-md-6">
                            <div class="card-header">
                                <h3 class="card-title">Extra Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Title</th>
                                            <th>Discription</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Active Referals</td>
                                            <td><span class="badge bg-danger"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '1'"));  ?></span></td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '1'"));  ?>%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>In-Active Referals</td>
                                            <td><span class="badge bg-warning"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '0'"));  ?></span></td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-warning" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '0'"));  ?>%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Total Referals</td>
                                            <td><span class="badge bg-primary"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code'"));  ?></span></td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar bg-primary" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code'"));  ?>%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Sponsor Information</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>SPONSOR ID</th>
                                                <th>SPONSOR NAME</th>
                                                <th>SPONSOR EMAIL</th>
                                                <th>SPONSOR CODE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $fetch_level = "SELECT * FROM user_data WHERE user_type = 'SPONSOR' ";
                                            $result_level = mysqli_query($conn, $fetch_level);
                                            while ($rows = mysqli_fetch_assoc($result_level)) {
                                                $id = $rows['user_id'];
                                                $username = $rows['username'];
                                                $email = $rows['email'];
                                                $refral_code = $rows['refral_code'];
                                                echo "<tr>
                                                <td>$id</td>
                                                <td>$username</td>
                                                <td>$email</td>
                                                <td>$refral_code</td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
            </div>
            <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        </div>
        <!-- ./wrapper -->

    <?php } else {
    ?>

        <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
            <div class="wrapper">
                <!-- Preloader -->
                <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

                <!-- Navbar -->
                <?php include('./components/navbar.php'); ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <?php include('./components/sidebar.php'); ?>
                <!-- /.sidebar -->


                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <section class="content">
                        <?php
                        if (@$_GET['activation_status'] == '1') {
                            Notifications('info', 'Success!', 'Request For Account Verification!');
                        }
                        if ($active == "0") { ?>
                            <div class="container-fluid">
                                <div class="row p-2">
                                    <a class="btn btn-primary col-md-12" href="./api/validate.php?parent_code=<?php echo $parent_code; ?>&&sponser_id=<?php echo $sponser_id; ?>&&refral_code=<?php echo $refral_code; ?>&&email=<?php echo $email; ?>&&username=<?php echo $username; ?>">Click Here To Activate your Account!</a>
                                </div>
                            </div>
                        <?php } else { ?><div class="container-fluid">
                                <div class="row p-2">
                                    <input type='text' class='form-control col-md-8' id='myInput' disabled value='http://localhost/mlm/app/registration_refral.php?sponser_id=<?php echo $sponser_id; ?>&&refral_code=<?= $refral_code ?>'>
                                    <button onclick='myFunction()' class='btn btn-primary col-md-2'> Copy to clipboard</button></a>
                                    <?php
                                    $string = "http://hefuturedevelopment.com/app/registration_refral.php?sponser_id=$sponser_id&&refral_code=$refral_code";
                                    $final = urlencode($string);
                                    ?>
                                    <a href="whatsapp://send?text=<?php echo $final; ?>" class='btn btn-success col-md-2' data-action="share/whatsapp/share" target="_blank">Share on WhatsApp</a>
                                    <script>
                                        function myFunction() {
                                            /* Get the text field */
                                            var copyText = document.getElementById('myInput');

                                            /* Select the text field */
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                            /* Copy the text inside the text field */
                                            navigator.clipboard.writeText(copyText.value);

                                            /* Alert the copied text */
                                            alert('Copied the text: ' + copyText.value);
                                        }
                                    </script>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Info boxes -->
                        <div class="row p-2">
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?php
                                            $total = mysqli_query($conn, "SELECT `amount` FROM `wallet` WHERE `email` = '$email'");
                                            $sum = 0;
                                            while ($row = mysqli_fetch_array($total)) {
                                                $amount = $row['amount'];
                                                $sum += (int)$amount;
                                            }
                                            echo $sum;

                                            ?></h3>

                                        <p>Total Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>0<sup style="font-size: 20px">%</sup></h3>

                                        <p>One Time Level Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Daily AdView Level Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Autopool Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>0<sup style="font-size: 20px">%</sup></h3>

                                        <p>Rank & Reward Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Sunday Reward Income</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row p-2">
                            <div class="col-md-6">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header text-white" style="background: url('./assets/dist/img/photo1.png') center center;">
                                        <h3 class="widget-user-username text-right"><?php echo $username ?></h3>
                                        <h5 class="widget-user-desc text-right"><?php echo $email ?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <?php
                                        if ($profile_pic == "") {
                                            echo "<img class='img-circle' src='./assets/dist/img/user3-128x128.jpg' alt='User Avatar'>";
                                        } else {
                                            echo "<img class='img-circle' src='$profile_pic' alt='User Avatar'>";
                                        } ?>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?php if ($active == 1) {
                                                                                        echo "ACTIVE";
                                                                                    } else {
                                                                                        echo "IN-ACTIVE";
                                                                                    } ?></h5>
                                                    <span class="description-text">STATUS</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?php if ($account_number) {
                                                                                        echo "COMPLETED";
                                                                                    } else {
                                                                                        echo "IN-COMPLETE";
                                                                                    } ?></h5>
                                                    <span class="description-text">PROFILE COMPLETED</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <div class="card col-md-6">
                                <div class="card-header">
                                    <h3 class="card-title">Extra Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Title</th>
                                                <th>Discription</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Active Referals</td>
                                                <td><span class="badge bg-danger"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '1'"));  ?></span></td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '1'"));  ?>%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>In-Active Referals</td>
                                                <td><span class="badge bg-warning"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '0'"));  ?></span></td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-warning" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code' AND active = '0'"));  ?>%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Total Referals</td>
                                                <td><span class="badge bg-primary"><?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code'"));  ?></span></td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar bg-primary" style="width: <?php echo $finel = mysqli_num_rows($conn->query("SELECT username FROM user_data WHERE parent_code='$refral_code'"));  ?>%"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Level Member View</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>LEVEL</th>
                                                    <th>USERNAME</th>
                                                    <th>PAID</th>
                                                    <th>UNPAID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $fetch_level = "SELECT * FROM user_data WHERE parent_code = '$refral_code'";
                                                $result_level = mysqli_query($conn, $fetch_level);
                                                while ($rows = mysqli_fetch_assoc($result_level)) {
                                                    $username = $rows['username'];
                                                    $level = $rows['level'];
                                                    $active = $rows['active'];
                                                    echo "<tr>
                                                <td>$level</td>
                                                <td>$username</td>
                                                <td>$active</td>
                                                <td><span class='tag tag-success'>0</span></td>
                                            </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                </div>
                <!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            </div>
            <!-- ./wrapper -->
        <?php } ?>
        <?php include('./components/footer.php') ?>
        <?php include('./components/script.php') ?>