<?php
session_start();
require "admin/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--Character encoding for Unicode -->
    <meta name="description" content="Website for Thai Restaurant"><!-- describe the wibsite-->
    <meta name="keyword" content="Resturant , Eatfinity"><!-- for search engines-->
    <meta name="author" content="Manal Alsubaei"><!-- about the author-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- for good display in all screen.-->
    <!-- external style -->
    <link rel="icon" href="images/icon.jpg" sizes="16x16" type="image/jpg">
    <link rel="stylesheet" type="text/css" href="css//bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        a {
            color: #ee7a25;
        }

        nav,
        ul,
        .background {
            background: #f2f1f3;
        }

        ul li a:hover {
            background: #ededed;
            color: #4e311d;
        }

        #collapse button:active,
        ul li a:active,
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link,
        .dropdown-item.active,
        .dropdown-item:active {
            background: #fb7c07;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row fixed-top">
            <div class="col-8 pr-0">
                <nav class="navbar navbar-expand-md p-0">
                    <!-- Brand -->
                    <a class="navbar-brand" style="padding: 0px; margin-right:0px;" href="index.php">
                        <img src="images/log.png " alt="logo" height="40">
                    </a>
                    <!-- Toggler/collapsibe Button -->
                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav nav-pills">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link pl-3 pr-3">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="order.php" class="nav-link pl-3 pr-3">Order</a>
                            </li>
                            <!-- Dropdown -->
                            <li class="nav-item dropdown">
                                <a href="menu.php" class="nav-link dropdown-toggle pl-3 pr-3" id="navbardrop" data-toggle="dropdown">Menu</a>
                                <div class="dropdown-menu dropdown-menu-right mt-n1">
                                    <?php
                                    $query = "select * from category";
                                    $stm = $connection->prepare($query);
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['Category_id'];
                                            $name = $row['Category_name'];
                                            $image = $row['image'];
                                            if ($name !== "Foods") {
                                    ?>
                                                <a class="dropdown-item" href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a class="dropdown-item" href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>


            <div class="col-3 p-0">
                <nav class="navbar navbar-expand p-0">
                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse justify-content-end">
                        
                        <ul class="navbar-nav nav-pills">

                            <li class="nav-item">
                                <a href="order.php" class="nav-link pl-3 pr-3">
                                    <i class="fa fa-shopping-basket">
                                        <?php
                                        if (1 != 1) {
                                            echo '<span class=" badge font-weight-bolder bg-transparent p-0 m-0 mt-n2 text-danger">$value</span>';
                                        }
                                        ?>
                                    </i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="menu.php" class="nav-link pl-3 pr-3" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user-circle-o"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right mt-n1">
                                        <a href="login.php" class="dropdown-item">Login</a>
                                        <a href="signup.php" class="dropdown-item">Sign up</a>
                                        <?php
                                        if (isset($_SESSION['name'])) {
                                        ?>
                                            <a href="profile.php" class="dropdown-item disabled">Profile</a>
                                            <a href="login.php" class="dropdown-item disabled">Logout</a>
                                        <?php
                                        } else { ?>
                                            <a href="profile.php" class="dropdown-item">Profile</a>
                                            <a href="login.php" class="dropdown-item">Logout</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-1 pl-0 background">
                <nav class="navbar-expand-md justify-content-center p-0">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler border-success" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="fa fa-navicon p-1"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>