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
                <div class="row p-5">
                    <div class="col-md-12 bg-dark card-body">
                        <?php
                        // $sql = ("SELECT * FROM user_data");

                        // fetchDogRecursive($sql, $conn);

                        // function fetchDogRecursive($sql, $conn)
                        // {
                        //     $conn->execute(array($sql));

                        //     $dogData = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

                        //     $dog = array(
                        //         'id' => $dogData['user_id'],
                        //         'name' => $dogData['user_name'],
                        //         'mother' => null,
                        //         'father' => null
                        //     );

                        //     if ($dogData['parent_code'] !== null) {
                        //         $dog['father'] = fetchDogRecursive($dogData['father_id'], $conn);
                        //     }

                        //     return $dog;
                        // }

                        echo $parent_code = "2394056";
                        echo "<br>";
                        fetchGrandfather($parent_code, $conn);
                        function fetchGrandfather($parent_code, $conn)
                        {
                            $sql = mysqli_query($conn, "SELECT * FROM user_data WHERE refral_code = '$parent_code'");
                            while ($row = mysqli_fetch_array($sql)) {
                                $user_name = $row['username'];
                                $user_id = $row['user_id'];
                                $parent_code = $row['parent_code'];
                                print_r($parent = array(
                                    'id' => $user_id,
                                    'name' => $user_name,
                                    'parent_code' => $parent_code,
                                    '<br>'
                                ));
                                if ($parent_code !== null) {
                                    $parent['parent_code'] = fetchGrandfather($parent_code, $conn);
                                }

                                return $parent_code;
                            }
                        }
                        ?>

                    </div>
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