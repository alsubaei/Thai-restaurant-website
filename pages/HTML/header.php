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
    <link rel="icon" href="../../images/icon.jpg" sizes="16x16" type="image/jpg">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../BOOTSTRAP/css/bootstrap.min.css">
    <!-- external script -->
    <script src="../BOOTSTRAP/js/bootstrap.min.js"></script>     
    <style>
        .b {
            border: 4px solid red;
        }

        a {
            color: #ee7a25;
        }

        nav {
            background: #f2f1f3;
        }

        nav div ul li a:hover {
            background: #ededed;
            color: #4e311d;
        }

        nav div ul li a:active {
            background: #fb7c07;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm fixed-top" style="padding: 0px;">
        <!-- Brand -->
        <a class="navbar-brand" style="padding: 0px;" href="index.php">
            <img src="../../images/log.png " alt="logo" height="40">
        </a>
        <!-- Toggler/collapsibe Button -->


        <!-- Navbar links -->
        <div class="justify-content-center collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav nav-justified nav-pills" style="width: 100%;">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" data-toggle="pill">Home</a>
                </li>
                <li class="nav-item">
                    <a href="signup.php" class="nav-link" data-toggle="pill">Sign up</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link" data-toggle="pill">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link" data-toggle="pill">Login</a>
                </li>
                <li class="nav-item">
                    <a href="order.php" class="nav-link" data-toggle="pill">Order</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a href="menu.php" class=" nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Menu</a>
                    <div class="dropdown-menu">
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
        <div>
        <button class="navbar-toggler b" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon "></span>
        </button>
        <a class="navbar-brand" style="padding: 0px;" href="index.php">
            <img src="../../images/trolley.png" alt="trolley" width="35" height="40">
        </a>
        </div>
    </nav>

    <!-- 

    <nav class="navbar navbar-expand-sm fixed-top">
        <ul class="nav justify-content-center nav-pills nav-justified">
            <li class="nav-item">
                <a href="index.php" style="padding:0px;" class="nav-link" data-toggle="pill"><img src="../../images/log.png " alt="logo" height="43"></a>
            </li>
            <li class="nav-item">
                <a href="index.php" class="nav-link" data-toggle="pill">Home</a>
            </li>
            <li class="nav-item">
                <a href="signup.php" class="nav-link" data-toggle="pill">Sign up</a>
            </li>
            <li class="nav-item">
                <a href="profile.php" class="nav-link" data-toggle="pill">Profile</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link" data-toggle="pill">Login</a>
            </li>
            <li class="nav-item">
                <a href="order.php" class="nav-link" data-toggle="pill">Order</a>
            </li>
            <li class="nav-item dropdown">
                <a href="menu.php" class=" nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>
                <div class="dropdown-menu">
                    <?php
                    // $query = "select * from category";
                    // $stm = $connection->prepare($query);
                    // $stm->execute();
                    // if ($stm->rowCount()) {
                    //     foreach ($stm->fetchAll() as $row) {
                    //         $id = $row['Category_id'];
                    //         $name = $row['Category_name'];
                    //         $image = $row['image'];
                    //         if ($name !== "Foods") {
                    ?>
                                <a class="dropdown-item" href="menu.php?C_id=<?php
                                                                                //  echo $id 
                                                                                ?>"><?php
                                                                                    //  echo $name 
                                                                                    ?></a>
                            <?php
                            // } else {
                            ?>
                                <a class="dropdown-item" href="menu.php?C_id=<?php
                                                                                // echo $id 
                                                                                ?>"><?php
                                                                                    // echo $name 
                                                                                    ?></a>
                    <?php
                    //         }
                    //     }
                    // }
                    ?>
                </div>
            </li>
            <li class="nav-item">
                <a href="order.php" style="padding:0px;" class="nav-link" data-toggle="pill"><img src="../../images/trolley.png" alt="trolley" width="35" height="40"></a>
            </li>
        </ul>
    </nav> -->