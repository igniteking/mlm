<?php include('./components/includes.php'); ?>
<?php
include('./connection/global.php');
include('./connection/functions.php');  ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('./components/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('./components/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Withdrawal</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Income Wallet</a></li>
                                <li class="breadcrumb-item active">Withdrawal</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (@$_GET['status'] == 1) { ?>
                        <div class="row">
                            <div class="col-md-12 m-2 p-1 text-center bg-success card">
                                <h5 class="mt-1">Success!</h5>
                            </div>
                        </div><?php } ?>
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT SUM(amount) AS value_sum FROM wallet WHERE email='$email'");
                                        $row = mysqli_fetch_assoc($result);
                                        echo $sum = $row['value_sum'];
                                        ?></h3>
                                    <?php

                                    if (@$_POST['withdraw']) {
                                        $created_at = date('Y-m-d H:i:s');
                                        $amount = $_POST['amount'];
                                        if ($amount <= $sum) {
                                            $insert_widthrawl = mysqli_query($conn, ("INSERT INTO `withdrawal`(`id`, `user_email`, `amount`, `status`, `created_at`) VALUES (NULL,'$email','$amount','pending','$created_at')"));
                                            if ($insert_widthrawl) {
                                                echo "<meta http-equiv=\"refresh\" content=\"2; url=./widthrawl.php\">";
                                            } else {
                                                echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Error!</p>";
                                            }
                                        } else {
                                            echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Amount Is More Then you Wallet Amount!</p>";
                                        }
                                    }
                                    ?>
                                    <p>Total Income</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list"></i>
                                </div>
                                <?php
                                $get_account = (mysqli_query($conn, ("SELECT account_number FROM user_data WHERE email='$email'")));
                                while ($row = mysqli_fetch_array($get_account)) {
                                    $account_number = $row['account_number'];
                                }
                                if ($account_number) {
                                    $get_status = (mysqli_query($conn, ("SELECT status FROM withdrawal WHERE user_email='$email'")));
                                    while ($row = mysqli_fetch_array($get_status)) {
                                        $status = $row['status'];
                                    }
                                    if (@$status == 'pending') {
                                    } else {
                                        echo "<form action='./widthrawl.php' method='post'>
                                    <input type='number' name='amount' placeholder='Enter Amount Here' class='form-control'>
                                    <input type='submit' value='Click here to Withdraw' name='withdraw' class='btn btn-success col-md-12'>
                                    </form>";
                                    }
                                } else {
                                    echo "<a href='./profile.php'><p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Click tO Add Account Details to Widthrawl!</p></a><br>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Widthrawl Details</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Email</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $get_widthrawl = mysqli_query($conn, "SELECT * From withdrawal where user_email = '$email'");
                                                    while ($row = mysqli_fetch_array($get_widthrawl)) {
                                                        $id = $row['id'];
                                                        $user_email = $row['user_email'];
                                                        $amount = $row['amount'];
                                                        $status = $row['status'];
                                                        $created_at = $row['created_at'];
                                                        echo "
                                                        <tr>
                                                            <td>$id</td>
                                                            <td>$user_email</td>
                                                            <td>$amount</td>
                                                            <td>$created_at</td>";
                                                        if ($status == "pending") {
                                                            echo "<td><span class='btn btn-warning'>$status</span></td>";
                                                        } else if ($status == "Rejected") {
                                                            echo "<td><span class='btn btn-danger'>$status</span></td>";
                                                        } else {
                                                            echo "<td><span class='btn btn-success'>$status</span></td>";
                                                        }
                                                        echo "
                                                        </tr>
                                                        ";
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- ./wrapper -->
        <?php include('./components/footer.php') ?>
        <?php include('./components/script.php') ?>