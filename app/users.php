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
                                <h3 class="card-title">User Details</h3>
                                <div class="card-tools">
                                    <form action="./users.php" method="get">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="username" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
                                            <th>Number</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>IFSC Code</th>
                                            <th>PAN Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $username = @$_GET['username'];
                                        if ($username) {
                                            $fetch_all_users = mysqli_query($conn, "SELECT * FROM user_data WHERE user_type = 'user' AND username LIKE '%$username%'");
                                        } else {
                                            $fetch_all_users = mysqli_query($conn, "SELECT * FROM user_data WHERE user_type = 'user'");
                                        }
                                        while ($user = mysqli_fetch_array($fetch_all_users)) {
                                            $user_id = $user['user_id'];
                                            $username = $user['username'];
                                            $email = $user['email'];
                                            $active = $user['active'];
                                            $number = $user['number'];
                                            if ($active == 1) {
                                                $active = 'Active';
                                            } else {
                                                $active = 'In-Active';
                                            }
                                            $bank_name = $user['bank_name'];
                                            $ifsc_code = $user['ifsc_code'];
                                            $account_number = $user['account_number'];
                                            $pan_number = $user['pan_number'];
                                            echo "<tr>
                                            <td>$user_id</td>
                                            <td>$username</td>
                                            <td>$email</td>
                                            <td>$number</td>
                                            <td>$bank_name</td>
                                                <td>$ifsc_code</td>
                                                <td>$account_number</td>
                                                <td>$pan_number</td>
                                            <td><span class='tag tag-success'>$active</span></td>
                                            <td><a href='./helper/deleteUser.php?user_id=$user_id'><input type='button' value='Delete' class='btn btn-outline-danger'></a></td>
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