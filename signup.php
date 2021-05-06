<?php include "header.php"; ?>
<div class="container mb-5"><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <h1 align="center">Create Account</h1>
        <div class="card-deck mr-xl-5 ml-xl-5">
            <div class="card">
                <div class="card-body">

                    <div class="row pt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="uname">Username:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="uname" placeholder="Username" name="name" autofocus>
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $name = trim($_POST['name']);
                                if (is_numeric($name)) {
                                    $error['name'] = "<h4>Name is number!<br>Please enter just alphabet.</h4>";
                                    echo $error['name'];
                                }
                            }
                            ?>
                        </div>
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="email">Email:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div><input type="email" class="form-control" id="email" placeholder="email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text">@example.com</span>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                            }
                            ?>
                        </div>
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="phone">Phone:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="tel" class="form-control form-control-sm" id="phone" placeholder="Phone" name="phone">
                            </div>
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
                        </div>
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="address">Address:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="address" placeholder="address" name="address">
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $address = $_POST['address'];
                                if (is_numeric($address)) {
                                    $error['address'] = "<h4>address is number!<br>Please enter just alphabet.</h4>";
                                    echo $error['address'];
                                }
                            }
                            ?>
                        </div>
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="pwd">Password:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-sm" id="pwd" placeholder="Password" name="pass">
                            </div>
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
                            <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="re-pwd">Re-password:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-sm" id="re-pwd" placeholder="Re-password" name="repass">
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $re = $_POST['repass'];
                                if (!($password === $re)) {
                                    $error['re'] = "<h4>Password is not equle!<br>Please try again.</h4>";
                                    echo $error['re'];
                                }
                            }
                            ?>
                            <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="Profile">Profile:</label>
                            <div class="input-group input-group-sm mt-n2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-file"></i></span>
                                </div>
                                <input type="file" class="form-control form-control-sm pt-0" id="Profile" placeholder="Add your prfile" name="image">
                            </div>
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
                                            move_uploaded_file($tmp, "../images/$image_name");
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
                            <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col-2">
                            <input type="submit" name="submit" value="Sign up" class="btn btn-warning stretched-link mb-2">
                        </div>
                        <div class="col-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
if (isset($_POST['submit'])) {
    if (empty($error)) {
        $sql = "insert into users (User_name, User_image, Address, Phone, Eamil, Password ) values (:x1, :x2, :x3, :x4, :x5, :x6 )";
        $sem = $connection->prepare($sql);
        $sem->execute(array("x1" => $name, "x2" => $image_name, "x3" => password_hash($address, PASSWORD_DEFAULT), "x4" => $phone, "x5" =>  $email, "x6" => $password));
        if ($sem->rowcount()) {
            header("LOCATION:index.php");
        } else {
            echo "Database is full";
        }
    }
}
include "footer.php";
?>