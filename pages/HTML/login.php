<?php
include "header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["submit"])) {

        if (isset($_POST["name"])) {
            $name = trim($_POST["name"]);
            if (is_numeric($name)) {
                $error['name'] = "<h5 style='color:red '><b>Name is number!<br>Please enter just alphabet</b></h5>";
            }
        } else {
            $error['Writename'] = "<h5 style='color:red '><b> Enter your Name</b></h5>";
        }

        if (isset($_POST['password'])) {
            $password = trim($_POST['password']);
            if (is_numeric($password)) {
                $error['pass'] = "<h5 style='color:red '><b>Password is number!<br>Please make mix</b></h5>";
            } elseif (strlen($password) < 5) {
                $error['long_pass'] = "<h5 style='color:red '><b>Password is smaller than 5!<br>Please try again</b></h5>";
            }
        } else {
            $error['Writepass'] = "<h5 style='color:red '><b>Enter your password</b></h5>";
        }

        if (empty($error)) {
            // SELECT `User_id`, `User_name`, `User_image`, `Address`, `Phone`, `Eamil`, `Password`, `Role_id`, `Active` FROM `users` WHERE 1
            $query = "select * from users where User_name=:U_name and Active=1 ";
            $stm = $connection->prepare($query);
            $stm->execute(array('U_name' => $name));
            $try = 0;
            if ($stm->rowCount()) {
                $row = $stm->fetch();
                if(password_verify( $password ,$row['Password'] ) )
                {
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
    if(isset($_POST['signup'])) {
         header("LOCATION:signup.php");
    }
}
?>
<center>
    <div class="Main_content"><br><br><br>
        <form action="" method="POST">
            <h1 align="center">Login</h1>
            name<br>
            <input type="text" name="name" placeholder="name" class="signup">
            <?php if (isset($error['name'])) {
                echo ($error['name']);
            } ?>
            <?php if (isset($error['Writename'])) {
                echo ($error['Writename']);
            } ?>
            <br>passowrd<br>
            <input type="password" name="password" placeholder="password" class="signup" >
            <?php if (isset($error['pass'])) {
                echo ($error['pass']);
            } ?>
            <?php if (isset($error['long_pass'])) {
                echo ($error['long_pass']);
            } ?>
            <?php if (isset($error['Writepass'])) {
                echo ($error['Writepass']);
            } ?>
            <br><br>
            <input type="submit" name="submit" value="Login" class="login">

            <?php if (isset($try)) {
                echo ($try);
            } ?>
        </form>

    </div>

</center>
<?php
include "footer.php";
?>