<?php include('./connection/global.php'); ?>
<?php include('./components/includes.php'); ?>
<?php include('./connection/functions.php'); ?>


<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>H.E</b> Future</a>

            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <?php
                $register = @$_POST['register'];
                $terms = @$_POST['terms'];
                if ($register) {
                    if ($terms) {
                        $user_type = "user";
                        $username = @$_POST['username'];
                        $password = @$_POST['password'];
                        $r_pswd = @$_POST['r_pswd'];
                        $email = @$_POST['email'];
                        $number = @$_POST['mobile_number'];
                        $account_number = @$_POST['account_number'];
                        $re_account_number = @$_POST['re_account_number'];
                        $bank_name = @$_POST['bank_name'];
                        $ifsc_code = @$_POST['ifsc_code'];
                        $sponser_id = @$_POST['sponser_id'];
                        $date = date("Y-m-d H:i:s");
                        $query = mysqli_query($conn, "SELECT * FROM user_data WHERE sponser_id = '$sponser_id'");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                            Register($user_type, $username, $password, $r_pswd, $conn, $email, $number, $sponser_id, $account_number, $re_account_number, $bank_name, $ifsc_code, $date);
                        } else {
                            echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Invalid Sponsor Id!</p>
                        </center></div>";
                        }
                    } else {
                        echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Accept Terms and Conditions!</p>
                        </center></div>";
                    }
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="sponser_id" placeholder="Sponser ID">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Full name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name='email' placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="r_pswd" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name='mobile_number' placeholder="Mobile Number">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name='bank_name' placeholder="Bank Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-credit-card"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="account_number" placeholder="Account Number">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-list"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="re_account_number" placeholder="Re-Enter Account Number">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-list"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="ifsc_code" placeholder="IFSC Code">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-list"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="login.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>