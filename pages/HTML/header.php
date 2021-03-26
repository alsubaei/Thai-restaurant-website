<?php
session_start();
require "admin/dbconnect.php";?>
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
        <a href="index.php" style="padding:0px; "><img src="../../images/log.png " alt="logo" width="auto" height="40"
                align="left"
                style="border-radius: 50px; top:0px; position:fixed; z-index:1; left:50px; object-fit: contain;"></a>
        <ul>
            <li class="li"><a href="index.php">Home</a></li>
            <li class="li"><a href="signup.php">Sign up</a></li>
            <li class="li"><a href="profile.php">Profile</a></li>
            <li class="li"><a href="login.php">Login</a></li>
            <li class="li"><a href="order.php">Order</a></li>
            <li class="li">
                <div class="dropdown menu">
                    <a href="menu.php">Menu</a>
                    <div class="Dropdown_content">
                        <ul>
                            <?php 
										$query="select * from category";
										$stm=$connection->prepare($query);
										$stm->execute();
										if($stm->rowCount())
										{
											foreach($stm->fetchAll() as $row)
											{
													$id=$row['Category_id'];
													$name=$row['Category_name'];
													$image=$row['image'];
													if( $name !== "Foods")
													{
									?>
                            <li><a href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a></li>
                            <?php	
													}
												else
													{
														?>
                            <div class="dropdown_a">
                                <li><a href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
                                    <?php
											 		}
											}
										}
									?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </div>
    </li>

    </ul>
    <a href="order.php"><img src="../../images/trolley.png" alt="trolley" width="35" height="40" align="right"
            style="top:0px; position:fixed; z-index:1; right:50px;"></a>
    </div>