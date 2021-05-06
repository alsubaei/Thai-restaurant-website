<?php
include "header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["submit"])) {

        if (isset($_POST["name"])) {
            $name = trim($_POST["name"]);
            if (is_numeric($name)) {
                $error['name'] = "<span style='color:red'><small>Name is number!<br>Please enter just alphabet</small></span>";
            }
        } else {
            $error['Writename'] = "<span style='color:red'><small>Enter your Name</small></span>";
        }

        if (isset($_POST['password'])) {
            $password = trim($_POST['password']);
            if (is_numeric($password)) {
                $error['pass'] = "<span style='color:red'><small>Password is number!<br>Please make mix</small></span>";
            } elseif (strlen($password) < 5) {
                $error['long_pass'] = "<span style='color:red'><small>Password is smaller than 5!<br>Please try again</small></span>";
            }
        } else {
            $error['Writepass'] = "<span style='color:red'><small>Enter your password</small></span>";
        }

        if (empty($error)) {
            // SELECT `User_id`, `User_name`, `User_image`, `Address`, `Phone`, `Eamil`, `Password`, `Role_id`, `Active` FROM `users` WHERE 1
            $query = "select * from users where User_name=:U_name and Active=1 ";
            $stm = $connection->prepare($query);
            $stm->execute(array('U_name' => $name));
            $try = 0;
            if ($stm->rowCount()) {
                $row = $stm->fetch();
                if (password_verify($password, $row['Password'])) {
                    if ($row['Role_id'] == 1) {
                        echo "admin";
                        $_SESSION['name'] = $name;
                        $_SESSION['role'] = 1;
                        header("LOCATION:admin/index.php");
                    } else {
                        echo "user";
                        $_SESSION['name'] = $name;
                        $_SESSION['role'] = 2;
                        header("LOCATION:index.php");
                    }
                }
            } else {
?>
                <script>
                    alert("your name or password is not correct.")
                </script>

<?php
                $try = '<input type="submit" name="signup" value="Sign up" class="login">';
            }
        }
    }
    if (isset($_POST['signup'])) {
        header("LOCATION:signup.php");
    }
}
?>

<div class="container mb-5"><br><br>
    <form action="" method="POST">
        <h1 align="center">Login</h1>
        <div class="card-deck mr-xl-5 ml-xl-5">
            <div class="card">
                <div class="card-body">

                    <div class="row pt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="uname">Username:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="uname" placeholder="Username" name="name" autofocus>
                            </div>
                            <?php
                            if (isset($error['Writename'])) {
                                echo ($error['Writename']);
                            }
                            if (isset($error['name'])) {
                                echo ($error['name']);
                            }
                            ?>
                        </div>
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        <div class="col-10 col-xl-6 col-lg-6 col-md-8">
                            <label for="pwd">Password:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
                            </div>
                            <?php
                            if (isset($error['Writepass'])) {
                                echo ($error['Writepass']);
                            }
                            if (isset($error['pass'])) {
                                echo ($error['pass']);
                            }
                            if (isset($error['long_pass'])) {
                                echo ($error['long_pass']);
                            }
                            ?><div class="col-1 col-xl-3 col-lg-3 col-md-2"></div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-5"></div>
                        <div class="col-2">
                            <input type="submit" name="submit" value="Login" class="btn btn-warning stretched-link mb-2">
                        </div>
                        <div class="col-5"></div>
                    </div>
                    <?php if (isset($try)) {
                        echo ($try);
                    } ?>
                </div>
            </div>
        </div>
</div>


</form>

</div>
<?php
include "footer.php";
?>