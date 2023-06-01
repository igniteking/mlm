<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="./assets/dist/img/WhatsApp_Image_2022-11-17_at_22.34.12-removebg-preview-removebg-preview.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">H.E Future</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if ($profile_pic == "") {
                    echo "<img src='./assets/dist/img/user2-160x160.jpg' class='img-circle elevation-2' alt='User Image'>";
                } else {
                    echo "<img src='$profile_pic' class='img-circle elevation-2' alt='User Image'>";
                } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $username; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="./index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if ($user_type == 'admin') { ?>
                    <li class="nav-item">
                        <a href="./users.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                All Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./payment.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Payment
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./verification.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Verification
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./refral.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Refral View
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($user_type == 'user') { ?>
                    <li class="nav-item">
                        <a href="./sub_user.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Sub Users
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Fund Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ID ACtivation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Autopool Activation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ID Activation Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Autopool Activation Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Request Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Transfer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Transfer Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Recived Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Convert</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Convert Report</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Income Wallet
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./widthrawl.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdrawal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fund Convert Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Income Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>One Time Level Income</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Adview Level Income</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Autopool Income</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rank & Reward Income</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./profile.php" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Account Statement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Autopool Entries
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Silver Pool</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Emerald Pool</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ruby Pool</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gold Pool</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Platinum Pool</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Diamond Pool</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            My Netword
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Direct Refral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>In-Active Direct Refral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Total Direct Refral</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Downline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Total Downline</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="./profile.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./helper/logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>