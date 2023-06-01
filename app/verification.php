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
                            <h1>Verification</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Income Wallet</a></li>
                                <li class="breadcrumb-item active">Verification</li>
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
                                            <h3 class="card-title">Verification Details</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>E-Mail</th>
                                                        <th>Transaction Id</th>
                                                        <th>Bank Name</th>
                                                        <th>Account Number</th>
                                                        <th>IFSC Code</th>
                                                        <th>PAN Number</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $parent_code = '1273960';

                                                    if (@$_GET['reject']) {
                                                        $user_email = $_GET['final_email'];
                                                        $update = mysqli_query($conn, "UPDATE `verification` SET `status`='Rejected' WHERE email = '$user_email'");
                                                        if ($update) {
                                                            echo "<meta http-equiv=\"refresh\" content=\"0; url=./verification.php\">";
                                                        } else {
                                                            echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Error!</p>";
                                                        }
                                                    }
                                                    $get_widthrawl = mysqli_query($conn, "SELECT * From verification");
                                                    while ($row = mysqli_fetch_array($get_widthrawl)) {
                                                        $id = $row['id'];
                                                        $user_email = $row['email'];
                                                        $status = $row['status'];
                                                        $transaction_id = $row['transaction_id'];
                                                        $created_at = $row['created_at'];
                                                        $sel = mysqli_query($conn, "SELECT * FROM user_data WHERE email = '$user_email'");
                                                        while ($row = mysqli_fetch_array($sel)) {
                                                            $sponsor_id_new = $row['sponser_id'];
                                                            $dinal_name = $row['username'];
                                                            $parent_code = $row['parent_code'];
                                                            $bank_name = $row['bank_name'];
                                                            $ifsc_code = $row['ifsc_code'];
                                                            $account_number = $row['account_number'];
                                                            $pan_number = $row['pan_number'];
                                                            echo "
                                                        <tr>
                                                            <td>$id</td>
                                                            <td>$user_email</td>
                                                            <td>$transaction_id</td>
                                                            <td>$bank_name</td>
                                                            <td>$account_number</td>
                                                            <td>$ifsc_code</td>
                                                            <td>$pan_number</td>
                                                            <td>$created_at</td>";
                                                            if ($status == "pending") {
                                                                echo "<td><form action='' method='GET'>
                                                                <input type='hidden' name='final_email' value='$user_email'>
                                                                <input type='hidden' name='sponser_id' value='$sponsor_id_new'>
                                                                <input type='hidden' name='parent_code' value='$parent_code'>
                                                                <input type='hidden' name='id' value='$id'>
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
                                                    }
                                                    if (@$_GET['verify']) {
                                                        $id = @$_GET['id'];
                                                        $final_email = @$_GET['final_email'];
                                                        $name = @$_GET['username'];
                                                        $refral_code = @$_GET['refral_code'];
                                                        $sponser_id_final = @$_GET['sponser_id'];
                                                        $parent_code = @$_GET['parent_code'];
                                                        $created_at = date("Y-m-d H:i:s");


                                                        // SELECTING SPONSOR TO CHECK IF IT IS THE GRAND-FATHER
                                                        $checking_person = array_values(mysqli_fetch_array($conn->query("SELECT parent_code from user_data WHERE email = '$final_email'")))[0];
                                                        $sponser_email = (mysqli_query($conn, "SELECT * from user_data WHERE refral_code = '$parent_code'"));
                                                        while ($row = mysqli_fetch_array($sponser_email)) {
                                                            $sponser_email_new = $row['email'];
                                                            $user_type = $row['user_type'];
                                                            if ($user_type == 'sponsor') {
                                                                if ($sponser_email_new) {
                                                                    // COMPANY 700 INR
                                                                    mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, 'hefuture@gmail.com', '700' ,'$created_at')");

                                                                    // SELECTING REFRAL PERSON FOR 300 INR
                                                                    $refral_person = array_values(mysqli_fetch_array($conn->query("SELECT email from user_data WHERE refral_code = '$parent_code'")))[0];
                                                                    mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, '$refral_person', '300', '$created_at')");
                                                                }
                                                            } else if ($checking_person == '') {
                                                                // COMPANY 1000 INR
                                                                mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, 'hefuture@gmail.com', '1000' ,'$created_at')");
                                                            } else {

                                                                // COMPANY 600 INR
                                                                mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, 'hefuture@gmail.com', '600' ,'$created_at')");

                                                                // SELECTING REFRAL PERSON FOR 300 INR
                                                                $refral_person = array_values(mysqli_fetch_array($conn->query("SELECT email from user_data WHERE refral_code = '$parent_code'")))[0];
                                                                mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, '$refral_person', '300', '$created_at')");

                                                                // SELECTING ALL PERSON WIHT SAME SPONSER CODE
                                                                $final = mysqli_num_rows($conn->query("SELECT sponser_id from user_data WHERE sponser_id = '$sponser_id_final'")) - 2;

                                                                if ($final == 0) {
                                                                    $final_amount = 100;
                                                                } else {
                                                                    $final_amount = 100 / $final;
                                                                }
                                                                // DIVIDING THE AMOUNT IN EACH PERSON
                                                                $round_final = round($final_amount);

                                                                // PAYING SPONSER ROUNDED PART OF HIS/HER AMOUNT
                                                                $sponser_email = (mysqli_query($conn, "SELECT email from user_data WHERE refral_code = '$sponser_id_final'"));
                                                                while ($row = mysqli_fetch_array($sponser_email)) {
                                                                    $sponser_email_new = $row['email'];
                                                                    mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, '$sponser_email_new', '$round_final', '$created_at')");
                                                                }

                                                                // PAYING ALL THE PEOPLE THEIR SHARE FROM THE 100 INR AFTER PAYING SPONSER HIS/HER SHARE
                                                                if (!function_exists('fetchGrandfather')) {
                                                                    function fetchGrandfather($parent_code, $conn, $round_final, $created_at)
                                                                    {
                                                                        $sql = mysqli_query($conn, "SELECT * FROM user_data WHERE refral_code = '$parent_code'");
                                                                        while ($row = mysqli_fetch_array($sql)) {
                                                                            $user_name = $row['username'];
                                                                            $user_id = $row['user_id'];
                                                                            $new_email = $row['email'];
                                                                            $parent_code = $row['parent_code'];
                                                                            ($parent = array(
                                                                                'id' => $user_id,
                                                                                'name' => $user_name,
                                                                                'email' => $new_email,
                                                                                'parent_code' => $parent_code,
                                                                            ));
                                                                            if ($parent_code !== null) {
                                                                                $parent['parent_code'] =  fetchGrandfather($parent_code, $conn, $round_final, $created_at);
                                                                            }
                                                                            mysqli_query($conn, "INSERT INTO `wallet`(`id`, `email`, `amount`, `created_at`)VALUE(NULL, '$new_email', '$round_final', '$created_at')");
                                                                            return $new_email;
                                                                        }
                                                                    }
                                                                }
                                                                @fetchGrandfather($parent_code, $conn, $round_final, $created_at);
                                                                $sql_new = mysqli_query($conn, "SELECT id FROM wallet");
                                                                while ($row = mysqli_fetch_array($sql_new)) {
                                                                    $delete_id = $row['id'];
                                                                }
                                                                mysqli_query($conn, "DELETE FROM `wallet` WHERE id = '$delete_id'");
                                                            }
                                                            // INSERTING PAYMENT ID AND UPDATING ACTIVE TO 1 FOR ID ACTIVATION
                                                            mysqli_query($conn, "INSERT INTO payment(id, name, email, created_at) values(NULL, '$name', '$final_email', '$created_at')");
                                                            mysqli_query($conn, "UPDATE `verification` SET `status`='active' WHERE id = '$id'");
                                                            $update = mysqli_query($conn, "UPDATE user_data SET `active` = '1' WHERE `email` = '$final_email'");
                                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=./verification.php\">";
                                                            if ($update) {
                                                                echo "<meta http-equiv=\"refresh\" content=\"2; url=./verification.php\">";
                                                            } else {
                                                                echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Error!</p>";
                                                            }
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