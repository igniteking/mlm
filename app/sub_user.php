<?php include('./components/includes.php'); ?>
<?php include('./connection/global.php'); ?>
<?php include('./connection/functions.php'); ?>

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
                <div class="row">
                    <div class="col-12 p-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub User Details</h3>

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
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Sub-User Chilren / Active Status</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Initialize the variable FOR LOOP
                                        $i = 0;

                                        // Start the loop
                                        $loop = 10;
                                        while ($i <= $loop) {
                                            $fetch_all_subusers = mysqli_query($conn, "SELECT * FROM user_data WHERE user_type = 'user' AND parent_code = '$refral_code'");
                                            while ($user = mysqli_fetch_array($fetch_all_subusers)) {
                                                $user_id = $user['user_id'];
                                                $username = $user['username'];
                                                $email = $user['email'];
                                                $active = $user['active'];
                                                $new_refral_code = $user['refral_code'];
                                                $sponser_id = $user['sponser_id'];
                                                $number = $user['number'];
                                                $refral_code = $user["refral_code"];
                                                if ($active == 1) {
                                                    $active = 'Active';
                                                } else {
                                                    $active = 'In-Active';
                                                }
                                                $fetch_all_users_from_sub = mysqli_query($conn, "SELECT * FROM user_data WHERE user_type = 'user' AND parent_code = '$new_refral_code'");
                                                $data = mysqli_num_rows($fetch_all_users_from_sub);
                                                $fetch_all_users_from_sub_active = mysqli_query($conn, "SELECT * FROM user_data WHERE user_type = 'user' AND parent_code = '$new_refral_code' AND active = 1");
                                                $active_data = mysqli_num_rows($fetch_all_users_from_sub_active);
                                                echo "<tr>
                                                <td>$user_id</td>
                                                <td>$username</td>
                                                <td>$email</td>
                                                <td>$data / $active_data</td>
                                                <td><span class='tag tag-success'>$active</span></td>
                                            </tr>";
                                            }
                                            // Increment the variable
                                            $i++;
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
                <!-- /.row -->
        </div>
        <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <?php include('./components/footer.php') ?>
    <?php include('./components/script.php') ?>