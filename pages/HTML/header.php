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
</head>

<body>
    <div class="navigation">
        <ul class="nav justify-content-center nav-pills nav-justified">
            <li class="nav-item">
                <a href="index.php" style="padding:0px;"  class="nav-link" data-toggle="pill"><img src="../../images/log.png " alt="logo" width="100%" height="40" ></a>
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
            <li class="nav-item">
                <div class="dropdown menu">
                    <a href="menu.php" class="nav-link" data-toggle="pill">Menu</a>
                    <div class="Dropdown_content">
                        <ul>
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
                                        <li class="nav-item"><a class="nav-link" href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="dropdown_a">
                                            <li class="nav-item"><a class="nav-link" href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
                                    <?php
                                    }
                                }
                            }
                                    ?>
                                        </div>
                    </div>
            </li>
            <li class="nav-item">
                <a href="order.php"  style="padding:0px;"  class="nav-link" data-toggle="pill"><img src="../../images/trolley.png" alt="trolley" width="35" height="40"></a>
            </li>
        </ul>
    </div>
    </div>
    </li>

    </ul>
    </div>