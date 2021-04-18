<?php include "header.php";

$sql = "select * from users  where User_name = :x1 ";
$query = $connection->prepare($sql);
if (isset($_SESSION['name'])) {
    $query->execute(array("x1" => $_SESSION['name']));
    if ($query->rowcount() > 0) {
        $row = $query->fetch();
    }
} else {
    header("location:login.php");
}
?>
<center>

    <div class="Main_content"><br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <h1 align="center">Profile Account</h1>
            <img src="../../images/<?php if (isset($row['User_image'])) {
                                        echo $row['User_image'];
                                    } ?>" alt="<?php if (isset($row['User_image'])) {
                                                    echo $row['User_image'];
                                                } ?>" style="border: none;
	width: 100px;
	border-radius: 50px;
	height: 100px;
    object-fit: fill;
    margin:-20px 0px 5px;
	transition: none;">
            <br>
            name<br>
            <input type="hidden" name="id" value="<?php if (isset($row['User_id'])) {
                                                        echo $row['User_id'];
                                                    } ?>">
            <input type="text" name="name" placeholder="name" class="signup" value="<?php if (isset($row['User_name'])) {
                                                                                        echo $row['User_name'];
                                                                                    } ?>" required autofocus>
            <?php
            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);
                $error = array();
                if (is_numeric($name)) {
                    $error['name'] = "<h4>Name is number!<br>Please enter just alphabet.</h4>";
                    echo $error['name'];
                }
            }
            ?>
            <br>email<br>
            <input type="email" name="email" placeholder="email" class="signup" value="<?php if (isset($row['Eamil'])) {
                                                                                            echo $row['Eamil'];
                                                                                        } ?>" required>
            <?php
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            ?>

            <br>phone<br>
            <input type="tel" name="phone" placeholder="phone" class="signup" value="<?php if (isset($row['Phone'])) {
                                                                                            echo $row['Phone'];
                                                                                        } ?>" required>
            <?php
            if (isset($_POST['submit'])) {
                $phone = $_POST['phone'];
                if (!is_numeric($phone)) {
                    $error['phone'] = "<h4>Phone is string!<br>Please enter just numbers.</h4>";
                    echo $error['phone'];
                } else {
                    if (strlen($phone) < 9) {
                        $error['phone'] = "<h4>Phone is smaller than 9 numbers.</h4>";
                        echo $error['phone'];
                    }
                }
            }
            ?>
            <br>address<br>
            <input type="text" name="address" placeholder="address" class="signup" value="<?php if (isset($row['Address'])) {
                                                                                                echo $row['Address'];
                                                                                            } ?>" required>
            <?php
            if (isset($_POST['submit'])) {
                $address = $_POST['address'];
                if (is_numeric($address)) {
                    $error['address'] = "<h4>address is number!<br>Please enter just alphabet.</h4>";
                    echo $error['address'];
                }
            }
            ?>
            <br>passowrd<br>
            <input type="password" name="pass" placeholder="password" class="signup" value="<?php if (isset($row['Password'])) {
                                                                                                echo $row['Password'];
                                                                                            } ?>" required>
            <?php
            if (isset($_POST['submit'])) {
                $password = $_POST['pass'];
                if (is_numeric($password)) {
                    $error['pass'] = "<h4>Password is number!<br>Please make mix.</h4>";
                    echo $error['pass'];
                    if (strlen($password) < 5) {
                        $error['long_pass'] = "<h4>Password is smaller than 5!<br>Please try again.</h4>";
                        echo $error['long_pass'];
                    }
                }
            }
            ?>
            <br>re_passowrd<br>
            <input type="password" name="repass" placeholder="re_password" class="signup" value="<?php if (isset($row['Password'])) {
                                                                                                        echo $row['Password'];
                                                                                                    } ?>" required>
            <?php
            if (isset($_POST['submit'])) {
                $re = $_POST['repass'];
                if (!($password === $re)) {
                    $error['re'] = "<h4>Password is not equle!<br>Please try again.</h4>";
                    echo $error['re'];
                }
            }
            ?>
            <br>Profile<br>
            <center>
                <input type="file" name="image" title="Add your prfile" value="<?php if (isset($row['User_image'])) {
                                                                                    echo $row['User_image'];
                                                                                } ?>">
                <?php
                if (!empty($_FILES['image']['name'])) {
                    $image = $_FILES['image']['name'];
                    $tmp =  $_FILES['image']['tmp_name'];
                    $array = array("png", "jpg", "jpeg", "gif", "jfif");
                    $extendName = explode(".", "$image");
                    $extend = strtolower(end($extendName));
                    if (in_array($extend, $array)) {
                        if ($_FILES['image']['size'] <= 2000000000) {
                            move_uploaded_file($tmp, "../../images/$image");
                        } else {
                            echo "<h4>your file size is not support</h4>";
                        }
                    } else {
                        echo "<h4>your file type is not support</h4>";
                    }
                } elseif (isset($row['User_id'])) {
                    $sql = "select * from users  where User_id = :x1 ";
                    $query = $connection->prepare($sql);
                    $query->execute(array("x1" => $row['User_id']));
                    if ($query->rowcount() > 0) {
                        $row = $query->fetch();
                    }
                    $image = $row['User_image'];
                } else {
                    echo "<h4>choose image</h4>";
                }
                ?>

            </center><?php
                        if (isset($_POST['submit'])) {
                            $re = $_POST['repass'];
                            if (!($password === $re)) {
                                $error['re'] = "<h4>Password is not equle!<br>Please try again.</h4>";
                                echo $error['re'];
                            }
                        }
                        ?>
            <br><br>
            <input type="submit" name="submit" value="Done" class="login">
        </form>
    </div>

</center>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "update users set User_name=:x1, User_image=:x2, Address=:x3, Phone=:x4, Eamil=:x5, Password=:x6 , Role_id = 2 where User_id =:x8";
    $query = $connection->prepare($sql);
    $query->execute(array("x1" => $name, "x2" => $image, "x3" => $address, "x4" => $phone, "x5" => $_POST['email'], "x6" => $password, "x8" => $_POST['id']));
    if ($query->rowcount() > 0) {
        header("LOCATION:index.php");
    } else {
        echo "no row updated";
    }
}

include "footer.php";
?>