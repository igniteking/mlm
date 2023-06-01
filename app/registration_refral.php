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
                        $recived_refral_code = @$_GET['refral_code'];
                        $user_type = "user";
                        $username = @$_POST['username'];
                        $password = @$_POST['password'];
                        $r_pswd = @$_POST['r_pswd'];
                        $email = @$_POST['email'];
                        $account_number = @$_POST['account_number'];
                        $re_account_number = @$_POST['re_account_number'];
                        $bank_name = @$_POST['bank_name'];
                        $sponser_id = @$_POST['sponser_id'];
                        $ifsc_code = @$_POST['ifsc_code'];
                        $date = date("Y-m-d H:i:s");

                        if ($username && $password && $r_pswd && $user_type) {
                            $user_check2 = "SELECT email from user_data WHERE email='$email'";
                            $result2 = mysqli_query($conn, $user_check2);
                            $result_check2 = mysqli_num_rows($result2);
                            if (!$result_check2 > 0) {
                                $query = mysqli_query($conn, "SELECT * FROM user_data WHERE sponser_id = '$sponser_id'");
                                echo $count = mysqli_num_rows($query);
                                if ($count > 0) {
                                    if ($password == $r_pswd) {
                                        if (preg_match("/\d/", $password)) {
                                            if (preg_match("/[A-Z]/", $password)) {
                                                if (preg_match("/[a-z]/", $password)) {
                                                    if (preg_match("/\W/", $password)) {
                                                        $refral_code = rand(0, 9999999);
                                                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                        $fetch_level = "SELECT level FROM user_data WHERE parent_code = '$recived_refral_code'";
                                                        $result_level = mysqli_query($conn, $fetch_level);
                                                        while ($rows = mysqli_fetch_assoc($result_level)) {
                                                            $level = $rows['level'];
                                                        }
                                                        if (isset($level)) {
                                                            $level_final = ++$level;
                                                        } else {
                                                            $level_final = "Level 1";
                                                        }
                                                        mysqli_query($conn, "INSERT INTO `user_data`(`user_id`, `username`, `email`, `password`, `user_type`, `sponser_id`, `account_number`, `bank_name`, `ifsc_code`, `refral_code`,`parent_code`, `level`, `created_at`) 
                                                    VALUES (NULL,'$username','$email','$hashedPwd', '$user_type','$sponser_id', '$account_number', '$bank_name', '$ifsc_code' ,'$refral_code', '$recived_refral_code', '$level_final', '$date')");
                                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=./api/validate.php?parent_code=$recived_refral_code&&sponser_id=$sponser_id&&refral_code=$refral_code&&username=$username&&email=$email\">";
                                                    } else {
                                                        echo "<div class='error-styler'><center>
                                                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one special character!</p>;
                                                            </center></div>";
                                                    }
                                                } else {
                                                    echo "<div class='error-styler'><center>
                                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one small Letter</p>
                                    </center></div>";
                                                }
                                            } else {
                                                echo "<div class='error-styler'><center>
                                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one Capital Letter</p>
                                    </center></div>";
                                            }
                                        } else {
                                            echo "<div class='error-styler'><center>
                                                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one digit</p>
                                </center></div>";
                                        }
                                    } else {
                                        echo "<div class='error-styler'><center>
                                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Both Password's Dont Match!</p>
                                </center></div>";
                                    }
                                } else {
                                    echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Invalid Sponsor Id!</p>
                        </center></div>";
                                }
                            } else {
                                echo "<div class='error-styler'><center>
                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail already exist!</p>
                                </center></div>";
                            }
                        } else {
                            echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Please Fill In All Fields!</p>
                                </center></div>";
                        }
                    } else {
                        echo "<div class='col-md-12 bg-danger p-2 text-center mb-4' style='border-radius: 5px;'><h5>Accept Terms and Conditions</h5></div>";
                    }
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>?refral_code=<?php echo $_GET['refral_code']; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="sponser_id" value="<?php echo $_GET['sponser_id'] ?>" placeholder="Sponser ID">
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