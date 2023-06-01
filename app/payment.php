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
                        <div class="col-lg-12 col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Widthrawal Details</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>E-Mail</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (@$_POST['reject']) {
                                                        $widthrawl_id = $_POST['widthrawl_id'];
                                                        $update = mysqli_query($conn, "UPDATE `withdrawal` SET `status`='Rejected' WHERE id = '$widthrawl_id'");
                                                        if ($update) {
                                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=#\">";
                                                        } else {
                                                            echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Error!</p>";
                                                        }
                                                    }
                                                    $get_widthrawl = mysqli_query($conn, "SELECT * From withdrawal");
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
                                                            echo "<td><form action='' method='POST'>
                                                                <input type='hidden' name='widthrawl_id' value='$id'>
                                                                <input type='submit' class='btn btn-outline-success' value='Verify' name='verify'>
                                                                <input type='submit' class='btn btn-outline-danger' value='Reject' name='reject'>
                                                            </form></td>";
                                                        } else if ($status == "Rejected") {
                                                            echo "<td><span class='btn btn-danger'>$status</span></td>";
                                                        } else {
                                                            echo "<td><span class='btn btn-success'>$status</span></td>";
                                                        }
                                                        echo "
                                                        </tr>
                                                        ";
                                                    }
                                                    if (@$_POST['verify']) {
                                                        $widthrawl_id = $_POST['widthrawl_id'];
                                                        $created_at = date("Y-m-d H:i:s");
                                                        $update = mysqli_query($conn, "UPDATE `withdrawal` SET `status`='Completed' WHERE id = '$widthrawl_id'");
                                                        $update2 = mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`) VALUES (NULL,'$user_email','-$amount','$created_at')");

                                                        if ($update2) {
                                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=#\">";
                                                        } else {
                                                            echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Error!</p>";
                                                        }
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