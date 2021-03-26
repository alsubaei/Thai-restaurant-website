<?php include "header.php"; ?>
<center>

    <div class="Main_content"><br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <h1 align="center">Create Account</h1>
            name<br>
            <input type="text" name="name" placeholder="name" class="signup" required autofocus>
            <?php
            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);
                if (is_numeric($name)) {
                    $error['name'] = "<h4>Name is number!<br>Please enter just alphabet.</h4>";
                    echo $error['name'];
                }
            }
            ?>
            <br>email<br>
            <input type="email" name="email" placeholder="email" class="signup" required>
            <?php
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            ?>

            <br>phone<br>
            <input type="tel" name="phone" placeholder="phone" class="signup" required>
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
            <input type="text" name="address" placeholder="address" class="signup" required>
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
            <input type="password" name="pass" placeholder="password" class="signup" required>
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
            <input type="password" name="repass" placeholder="re_password" class="signup" required>
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
                <input type="file" name="image" title="Add your prfile">
                <?php
                if (isset($_POST['submit'])) {
                    if (!empty($_FILES['image']['name'])) {
                        $image = $_FILES['image']['name'];
                        $tmp =  $_FILES['image']['tmp_name'];
                        $image_name = $image;
                        $array = array("png", "jpg", "jpeg", "gif", "jfif");
                        $extendName = explode(".", "$image");
                        $extend = strtolower(end($extendName));
                        if (in_array($extend, $array)) {
                            if ($_FILES['image']['size'] <= 2000000000) {
                                move_uploaded_file($tmp, "../../images/$image_name");
                            } else {
                                echo "<h4>your file size is not support</h4>";
                            }
                        } else {
                            echo "<h4>your file type is not support</h4>";
                        }
                    } else {
                        echo "<h4>choose image</h4>";
                    }
                }
                ?>

            </center>
            <br><br>
            <input type="submit" name="submit" value="Sign up" class="login">
        </form>
    </div>

</center>
<?php
if (isset($_POST['submit'])) {
    if (empty($error)) {
        $sql = "insert into users (User_name, User_image, Address, Phone, Eamil, Password ) values (:x1, :x2, :x3, :x4, :x5, :x6 )";
        $sem = $connection->prepare($sql);
        $sem->execute(array("x1" => $name, "x2" => $image_name, "x3" =>password_hash( $address ,PASSWORD_DEFAULT) , "x4" => $phone, "x5" =>  $email, "x6" => $password));
        if ($sem->rowcount()) {
            header("LOCATION:index.php");
        } else {
            echo "Database is full";
        }
    }
}


include "footer.php";
?>