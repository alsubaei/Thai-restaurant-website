<?php
include('header.php');
require('dbconnect.php');
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-bars"></i> Meals</h2>
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
                    if (!empty($_POST["tname"])) {
                        $tname = trim($_POST["tname"]);
                        if (is_numeric($tname)) {
                            $error['tname'] = "<h5 style='color:red '><b>Name is number!<br>Please enter just alphabet</b></h5>";
                        }
                    } else {
                        $error['tWritename'] = "<h5 style='color:red '><b> Enter Meal Thia Name</b></h5>";
                    }



                    if (!empty($_POST["ename"])) {
                        $ename = trim($_POST["ename"]);
                        if (is_numeric($ename)) {
                            $error['ename'] = "<h5 style='color:red '><b>Name is number!<br>Please enter just alphabet</b></h5>";
                        }
                    } else {
                        $error['eWritename'] = "<h5 style='color:red '><b> Enter Meal English Name</b></h5>";
                    }

                    if (!empty($_POST['cost'])) {
                        $cost = trim($_POST['cost']);
                        if (!is_numeric($cost)) {
                            $error['cost'] = "<h5 style='color:red '><b>Cost is string!<br>Please enter just numbers</b></h5>";
                        }
                    } else {
                        $error['Writecost'] = "<h5 style='color:red '><b>Enter your cost</b></h5>";
                    }


                    if (!empty($_FILES["image"]["name"])) {
                        $imge_name = $_FILES["image"]["name"];
                        $size = $_FILES["image"]["size"];
                        $mytypes = array("png", "jpg", "jpeg", "gif");
                        $ext = explode(".", "$imge_name");
                        $ext = strtolower(end($ext));
                        if (in_array($ext, $mytypes)) {
                            if ($size <= 2000000) {
                                if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../../../images/$imge_name"))) {
                                    $error['upload'] = "<h5 style='color:red '><b>Photo not upload successfully</b></h5>";
                                }
                            } else {
                                $error["size"] = "<h5 style='color:red '><b>Maximum 2M</b></h5>";
                            }
                        } else {
                            $error["type"] = "<h5 style='color:red '><b>Invalid Type</b></h5>";
                        }
                    } elseif (isset($_GET['action']) == 'Edit') {
                        $sql = "select * from meal where Meal_id = :x1 ";
                        $query = $connection->prepare($sql);
                        $query->execute(array("x1" => $_GET['id']));
                        if ($query->rowcount() > 0) {
                            $row = $query->fetch();
                        }
                        $imge_name = $row['image'];
                    } else {
                        $error["image"] = "<h5 style='color:red '><b>choose image</b></h5>";
                    }

                    /////////////////////////////////////////////////////////////////(       insert       )//////////////////////////////////////////////////////////////////////////////////////
                    if (empty($error)) {
                        if (empty($_POST['user_id'])) {
                            // SELECT `Meal_id`, `Meal_name`, `E_Meal_name`, `image`, `Meal_cost`, `Category_id`, `Active` FROM `meal` WHERE 1
                            $sql = "insert into meal (Meal_name, E_Meal_name, image, Meal_cost, Category_id) values (:x1, :x2, :x3, :x4, :x5)";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $tname, "x2" => $ename, "x3" => $imge_name, "x4" => $cost, "x5" => $_POST['role_id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row inserted succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row inserted</br></h4>";
                            }
                        } elseif (isset($_GET['action']) == 'Edit') {
                            // var_dump($_POST);
                            // echo "<br> edit";
                            
                            $sql = "update meal set Meal_name=:x1, E_Meal_name=:x2, image=:x3, Meal_cost=:x4, Category_id=:x5 where Meal_id =:x6 ";
                            $query = $connection->prepare($sql);
                            // var_dump(array("x1" => $tname, "x2" => $ename, "x3" => $imge_name, "x4" => $cost, "x5" => $_POST['role_id'], "x6" => $_POST['user_id']));
                            
                            $query->execute(array("x1" => $tname, "x2" => $ename, "x3" => $imge_name, "x4" => $cost, "x5" => $_POST['role_id'], "x6" => $_POST['user_id']));
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
                            $sql = "select * from meal  where Meal_id = :x1 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                $row = $query->fetch();
                            }
                            break;

                            /////////////////////////////////////////////////////////////////(      delete      )//////////////////////////////////////////////////////////////////////////////////////
                        case 'Delete':
                            $sql = "delete from meal where Meal_id = :x1 ";
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
                            // SELECT `Meal_id`, `Meal_name`, `E_Meal_name`, `image`, `Meal_cost`, `Category_id`, `Active` FROM `meal` WHERE 1
                            $sql = "update meal set Active = 1 where Meal_id = :x1 ";
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
                            $sql = "update meal set Active = 0 where Meal_id = :x1";
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
                        <i class="fa fa-plus-circle"></i> Add New Meal
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <form role="form" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?php if (isset($row['Meal_id'])) {
                                                                                    echo $row['Meal_id'];
                                                                                } ?>">
                                    <label>Thai Name</label>
                                    <input type="text" placeholder="Please Enter Thai Name " class="form-control" name="tname" value="<?php if (isset($row['Meal_name'])) {
                                                                                                                                            echo $row['Meal_name'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error["tname"])) {
                                    echo $error["tname"];
                                }
                                if (isset($error["tWritename"])) {
                                    echo $error["tWritename"];
                                }

                                ?>
                                <div class="form-group">
                                    <label>English Name</label>
                                    <input type="text" placeholder="Please Enter English Name " class="form-control" name="ename" value="<?php if (isset($row['E_Meal_name'])) {
                                                                                                                                            echo $row['E_Meal_name'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error["ename"])) {
                                    echo $error["ename"];
                                }
                                if (isset($error["eWritename"])) {
                                    echo $error["eWritename"];
                                }

                                ?>
                                <div class="form-group">
                                    <label>Meal image</label><br>
                                    <?php if (isset($row['image'])) {
                                    ?><img src="../../../images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" style="border: none;
                                        width: 100px;
                                        border-radius: 50px;
                                        height: 100px;
                                        object-fit: fill;
                                        transition: none;"><?php
                                                        } ?>
                                    <input type="file" class="form-control" placeholder="PLease Enter select your image" name="image" value="<?php if (isset($row['image'])) {
                                                                                                                                                    echo $row['image'];
                                                                                                                                                } ?>">
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
                                    <label>Cost</label>

                                    <input type="text" class="form-control" placeholder="Please Enter the cost" name="cost" value="<?php if (isset($row['Meal_cost'])) {
                                                                                                                                            echo $row['Meal_cost'];
                                                                                                                                        } ?>" required>
                                </div>
                                <?php
                                if (isset($error['Writecost'])) echo  $error['Writecost'];
                                if (isset($error["cost"])) echo $error["cost"];
                                ?>
                                <div class="form-group">
                                    <label>Meal Category</label>
                                    <select class="form-control" name="role_id">
                                        <?php
                                        // SELECT `Category_id`, `Category_name`, `image`, `Active` FROM `category` WHERE 1
                                        $sql = "select * from category ";
                                        $query = $connection->prepare($sql);
                                        $query->execute();
                                        if ($query->rowcount() > 0) {
                                            foreach ($query->fetchAll() as $row) {
                                                $id = $row['Category_id'];
                                                $role = $row['Category_name'];

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
                                    <button type="submit" class="btn btn-primary">Add Meal</button>
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
                        <i class="fa fa-bars"></i> Meal
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <!-- SELECT `Meal_id`, `Meal_name`, `E_Meal_name`, `image`, `Meal_cost`, `Category_id` FROM `meal` WHERE 1 -->
                                        <th>Thai Name</th>
                                        <th>English Name</th>
                                        <th>Image</th>
                                        <th>Cost</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                    <!-- SELECT `Meal_id`, `Meal_name`, `E_Meal_name`, `image`, `Meal_cost`, `Category_id` FROM `meal` WHERE 1 -->
                                    <?php
                                    $sql = "select * from meal ";
                                    $query = $connection->prepare($sql);
                                    $query->execute();
                                    if ($query->rowcount() > 0) {
                                        foreach ($query->fetchAll() as $row) {
                                            $User_id = $row['Meal_id'];
                                            $User_name = $row['Meal_name'];
                                            $User_image = $row['image'];
                                            $Cost = $row['Meal_cost'];
                                            $E_User_name = $row['E_Meal_name'];
                                            $category = $row['Category_id'];
                                            $Active = $row['Active'];
                                    ?>
                                            <tr class="odd gradeX">

                                                <td><?php echo  $User_name; ?></td>
                                                <td><?php echo  $E_User_name; ?></td>

                                                <td><img src="../../../images/<?php echo $User_image; ?>" alt="<?php echo $User_image; ?>" style="border: none;
                                                                                                                                                width: 100px;
                                                                                                                                                border-radius: 50px;
                                                                                                                                                height: 100px;
                                                                                                                                                object-fit: fill;
                                                                                                                                                transition: none;">
                                                </td>
                                                <td><?php echo $Cost; ?>$</td>
                                                <td><?php
                                                    // SELECT `Category_id`, `Category_name`, `image`, `Active` FROM `category` WHERE 1
                                                    $sql = "select * from category ";
                                                    $query = $connection->prepare($sql);
                                                    $query->execute();
                                                    if ($query->rowcount() > 0) {
                                                        foreach ($query->fetchAll() as $row) {
                                                            if ($category == $row['Category_id']) {
                                                                echo $row['Category_name'];
                                                            }
                                                        }
                                                    } ?></td>

                                                <td>
                                                    <a href="?action=Edit&id=<?php echo $User_id; ?>" class='btn btn-success'>Edit</a>
                                                    <a href="?action=Delete&id=<?php echo $User_id; ?>" class='btn btn-danger'>Delete</a>
                                                    <?php if ($Active == 0) {
                                                        echo " <a href='?action=Active&id=$User_id' class='btn btn-warning'>Active</a>";
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