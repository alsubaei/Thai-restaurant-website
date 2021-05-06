<?php
include('header.php');
require('dbconnect.php');
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-users"></i> Users</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    /////////////////////////////////////////////////////////////////(       valedation       )//////////////////////////////////////////////////////////////////////////////////////
                    if (!empty($_POST["name"])) {
                        $name = trim($_POST["name"]);
                        if (is_numeric($name)) {
                            $error['name'] = "<h5 style='color:red '><b>Name is number!<br>Please enter just alphabet</b></h5>";
                        }
                    } else {
                        $error['Writename'] = "<h5 style='color:red '><b> Enter your Name</b></h5>";
                    }


                    if (empty($_POST['email'])) {
                        $error['Writeemail'] = "<h5 style='color:red '><b> Enter your email</b></h5>";
                    }


                    if (!empty($_POST["address"])) {
                        $address = trim($_POST['address']);
                        if (is_numeric($address)) {
                            $error['address'] = "<h5 style='color:red '><b>address is number!<br>Please enter just alphabet</b></h5>";
                        }
                    } else {
                        $error['Writeadderss'] = "<h5 style='color:red '><b>Enter your addresss</b></h5>";
                    }


                    if (!empty($_POST['password'])) {
                        $password = trim($_POST['password']);
                        if (is_numeric($password)) {
                            $error['pass'] = "<h5 style='color:red '><b>Password is number!<br>Please make mix</b></h5>";
                        } elseif (strlen($password) < 5) {
                            $error['long_pass'] = "<h5 style='color:red '><b>Password is smaller than 5!<br>Please try again</b></h5>";
                        }
                    } else {
                        $error['Writepass'] = "<h5 style='color:red '><b>Enter your password</b></h5>";
                    }


                    if (!empty($_POST['phone'])) {
                        $phone = trim($_POST['phone']);
                        if (!is_numeric($phone)) {
                            $error['phone'] = "<h5 style='color:red '><b>Phone is string!<br>Please enter just numbers</b></h5>";
                        } else {
                            if (strlen($phone) < 9) {
                                $error['phone_lenght_small'] = "<h5 style='color:red '><b>Phone is smaller than 9 numbers</b></h5>";
                            }
                            if (strlen($phone) > 9) {
                                $error['phone_lenght_big'] = "<h5 style='color:red '><b>Phone is bigger than 9 numbers</b></h5>";
                            }
                        }
                    } else {
                        $error['Writephone'] = "<h5 style='color:red '><b>Enter your phone number</b></h5>";
                    }
                    if (!empty($_FILES["image"]["name"])) {
                        $imge_name = $_FILES["image"]["name"];
                        $size = $_FILES["image"]["size"];
                        $mytypes = array("png", "jpg", "jpeg", "gif");
                        $ext = explode(".", "$imge_name");
                        $ext = strtolower(end($ext));
                        if (in_array($ext, $mytypes)) {
                            if ($size <= 2000000) {
                                if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../images/$imge_name"))) {
                                    $error['upload'] = "<h5 style='color:red '><b>Photo not upload successfully</b></h5>";
                                }
                            } else {
                                $error["size"] = "<h5 style='color:red '><b>Maximum 2M</b></h5>";
                            }
                        } else {
                            $error["type"] = "<h5 style='color:red '><b>Invalid Type</b></h5>";
                        }
                    } elseif ( isset($_GET['action']) == 'Edit') {
                        $sql = "select * from users  where User_id = :x1 ";
                        $query = $connection->prepare($sql);
                        $query->execute(array("x1" => $_GET['id']));
                        if ($query->rowcount() > 0) {
                            $row = $query->fetch();
                        }
                        $imge_name = $row['User_image'];
                    } else {
                        $error["image"] = "<h5 style='color:red '><b>choose image</b></h5>";
                    }

                    /////////////////////////////////////////////////////////////////(       insert       )//////////////////////////////////////////////////////////////////////////////////////
                    if (empty($error)) {
                        if (empty($_POST['user_id'])) {
                            $e=password_hash( $password , PASSWORD_DEFAULT);
                            $sql = "insert into users (User_name, User_image, Address, Phone, Eamil, Password, Role_id) values (:x1, :x2, :x3, :x4, :x5, :x6, :x7)";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $name, "x2" => $imge_name, "x3" => $address, "x4" => $phone, "x5" => $_POST['email'], "x6" => $e  , "x7" => $_POST['role_id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row inserted succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row inserted</br></h4>";
                            }
                        } else {
                            $e=password_hash( $password , PASSWORD_DEFAULT);
                            $sql = "update users set User_name=:x1, User_image=:x2, Address=:x3, Phone=:x4, Eamil=:x5, Password=:x6, Role_id=:x7 where User_id =:x8";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $name, "x2" => $imge_name, "x3" => $address, "x4" => $phone, "x5" => $_POST['email'], "x6" => $e , "x7" => $_POST['role_id'], "x8" => $_POST['user_id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row updated succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row updated</br></h4>";
                            }
                        }
                    }
                }
                /////////////////////////////////////////////////////////////////(       edit, delete , active, unactive       )//////////////////////////////////////////////////////////////////////////////////////
                if (isset($_GET['action'], $_GET['id']) and intval($_GET['id']) > 0) {
                    switch ($_GET['action']) {
                        case 'Edit':
                            $sql = "select * from users  where User_id = :x1 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                $row = $query->fetch();
                            }
                            break;

                            /////////////////////////////////////////////////////////////////(      delete      )//////////////////////////////////////////////////////////////////////////////////////
                        case 'Delete':
                            $sql = "delete from users where User_id = :x1 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row deleted succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row deleted</br></h4>";
                            }
                            break;

                            /////////////////////////////////////////////////////////////////(      active      )//////////////////////////////////////////////////////////////////////////////////////

                        case 'Active':
                            $sql = "update users set Active = 1 where User_id = :x1 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row actived succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row actived</br></h4>";
                            }
                            break;

                            /////////////////////////////////////////////////////////////////(      unactive       )//////////////////////////////////////////////////////////////////////////////////////

                        case 'Unactive':
                            $sql = "update users set Active = 0 where User_id = :x1";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row unactived succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row unactived</br></h4>";
                            }
                            break;
                    }
                }
                ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i> Add New User
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <form role="form" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?php if (isset($row['User_id'])) {
                                                                                    echo $row['User_id'];
                                                                                } ?>">
                                    <label>Name</label>
                                    <input type="text" placeholder="Please Enter your Name " class="form-control" name="name" value="<?php if (isset($row['User_name'])) {
                                                                                                                                            echo $row['User_name'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error["name"])) {
                                    echo $error["name"];
                                }
                                if (isset($error["Writename"])) {
                                    echo $error["Writename"];
                                }

                                ?>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Please Enter your Email " class="form-control" name="email" value="<?php if (isset($row['Eamil'])) {
                                                                                                                                            echo $row['Eamil'];
                                                                                                                                        } ?>" required>
                                    <?php
                                    if (isset($error["Writeemail"])) echo $error["Writeemail"];
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>user image</label><br>
                                    <?php if (isset($row['User_image'])) {
                                    ?><img src="../images/<?php echo $row['User_image']; ?>" alt="<?php echo $row['User_image']; ?>" style="border: none;
                                        width: 100px;
                                        border-radius: 50px;
                                        height: 100px;
                                        object-fit: fill;
                                        transition: none;"><?php
                                                        } ?>
                                    <input type="file" class="form-control" placeholder="PLease Enter select your image" name="image" value="<?php if (isset($row['User_image'])) {
                                                                                                                                                    echo $row['User_image'];
                                                                                                                                                } ?>" >
                                    <?php
                                    if (isset($error['upload'])) echo $error['upload'];
                                    ?>
                                </div>
                                <?php
                                if (isset($error["size"])) echo $error["size"];
                                if (isset($error["type"])) echo $error["type"];
                                if (isset($error["image"])) echo $error["image"];
                                ?>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Please Enter password" name="password" value="<?php if (isset($row['Password'])) {
                                                                                                                                                echo $row['Password'];
                                                                                                                                            } ?>" required>
                                </div>
                                <?php
                                if (isset($error["pass"])) echo $error["pass"];
                                if (isset($error['long_pass'])) echo $error['long_pass'];
                                if (isset($error["Writepass"])) echo $error["Writepass"];
                                ?>

                                <div class="form-group">
                                    <label>address</label>
                                    <input type="text" class="form-control" placeholder="Please Enter address" name="address" value="<?php if (isset($row['Address'])) {
                                                                                                                                            echo $row['Address'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error['address'])) echo $error['address'];
                                if (isset($error['Writeadderss'])) echo $error['Writeadderss'];

                                ?>
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="tel" class="form-control" placeholder="Please Enter your phone" name="phone" value="<?php if (isset($row['Phone'])) {
                                                                                                                                            echo $row['Phone'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error['Writephone'])) echo  $error['Writephone'];
                                if (isset($error["phone"])) echo $error["phone"];
                                if (isset($error["phone_lenght_small"])) echo $error["phone_lenght_small"];
                                if (isset($error["phone_lenght_big"])) echo $error["phone_lenght_big"];
                                ?>
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control" name="role_id">
                                        <?php
                                        // INSERT INTO `roles`(`Role_id`, `Role_name`) VALUES ([value-1],[value-2])
                                        $sql = "select * from roles ";
                                        $query = $connection->prepare($sql);
                                        $query->execute();
                                        if ($query->rowcount() > 0) {
                                            foreach ($query->fetchAll() as $row) {
                                                $id = $row['Role_id'];
                                                $role = $row['Role_name'];

                                        ?>
                                                <option value="<?php echo $id; ?>"> <?php if (isset($role)) {
                                                                                        echo $role;
                                                                                    } ?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div style=" float:right;">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>


                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Users
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                    <?php
                                    // $sql = "INSERT INTO `users`( `User_name`, `User_image`, `Address`, `Phone`, `Eamil`, `Password`, `Role_id`, `Active`) VALUES ([manal],[kkk@l.com],[kkk@l.com],[88888888888],[kkk@l.com],[kkk@l.com],[9i9i],[1],[1])";
                                    $sql = "select * from users ";
                                    $query = $connection->prepare($sql);
                                    $query->execute();
                                    if ($query->rowcount() > 0) {
                                        foreach ($query->fetchAll() as $row) {
                                            $User_id = $row['User_id'];
                                            $User_name = $row['User_name'];
                                            $User_image = $row['User_image'];
                                            $Eamil = $row['Eamil'];
                                            $Address = $row['Address'];
                                            $Phone = $row['Phone'];
                                            $Password = $row['Password'];
                                            $Role_id = $row['Role_id'];
                                            $Active = $row['Active'];
                                    ?>
                                            <tr class="odd gradeX">

                                                <td><?php echo  $User_name; ?></td>
                                                <td><img src="../images/<?php echo $User_image; ?>" alt="<?php echo $User_image; ?>" style="border: none;
                                                                                                                                                width: 100px;
                                                                                                                                                border-radius: 50px;
                                                                                                                                                height: 100px;
                                                                                                                                                object-fit: fill;
                                                                                                                                                transition: none;">
                                                </td>
                                                <td><?php echo  $Eamil; ?></td>
                                                <td><?php echo $Password; ?></td>
                                                <td><?php echo  $Address; ?></td>
                                                <td><?php echo $Phone; ?></td>
                                                <td><?php if ($Role_id == 1) {
                                                        echo "Admin";
                                                    } else {
                                                        echo "User";
                                                    }  ?></td>

                                                <td>
                                                    <a href="?action=Edit&id=<?php echo $User_id; ?>" class='btn btn-success'>Edit</a>
                                                    <a href="?action=Delete&id=<?php echo $User_id; ?>" class='btn btn-danger'>Delete</a>
                                                    <?php if ($Active == 0) {
                                                        echo "<a href='?action=Active&id=$User_id' class='btn btn-warning'>Active</a>";
                                                    } else {
                                                        echo "<a href='?action=Unactive&id=$User_id' class='btn btn-primary'>Unactive</a>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->

            </div>
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
</div>



<?php
include("footer.php");
?>