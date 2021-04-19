<?php
include('header.php');
require('dbconnect.php');
?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-table"></i> Orders</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-8">
                <!-- Form Elements -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    /////////////////////////////////////////////////////////////////(       valedation       )/////////////////////////////////////////////////////////////////////////////////////
                    /////////////////////////////////////////////////////////////////(       insert       )//////////////////////////////////////////////////////////////////////////////////////
                    if (empty($error)) {
                            $sql = "insert into users (User_name, User_image, Address, Phone, Eamil, Password, Role_id) values (:x1, :x2, :x3, :x4, :x5, :x6, :x7)";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $name, "x2" => $imge_name, "x3" => $address, "x4" => $phone, "x5" => $_POST['email'], "x6" => $password, "x7" => $_POST['role_id']));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row inserted succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row inserted</br></h4>";
                            }
                        
                        }
                }
                /////////////////////////////////////////////////////////////////(       delete , active, unactive       )//////////////////////////////////////////////////////////////////////////////////////
                if (isset($_GET['action'], $_GET['id']) and intval($_GET['id']) > 0) {
                    switch ($_GET['action']) {
                        
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
                            // INSERT INTO `orders` (`Order_id`, `Order_date`, `User_name`, `image`, `name`, `Category_name`, `Active`) VALUES (NULL, current_timestamp(), 'manal', 'image2.jpg', 'ffffff', 'foods', '1');
                            $sql = "update orders set Active = 1 where Order_id = :x1 ";
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
                            $sql = "update orders set Active = 0 where Order_id = :x1";
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
                        <i class="fa fa-plus-circle"></i> Add New Order
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <form role="form" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                   <label>Name</label>
                                    <input type="text" placeholder="Please Enter your Name " class="form-control" name="name"  required>
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
                                    <label>Meal</label>
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
                                    <button type="submit" class="btn btn-primary">Add Order</button>
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
                        <i class="fa fa-table"></i> Orders
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <!-- SELECT `Order_id`, `Order_date`, `Active`, `User_id`, `Meal_id` FROM `orders` WHERE 1 -->
                                        <th>User</th>
                                        <th>Meal</th>
                                        <th>Date</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                    <?php
                                    // SELECT `Order_id`, `Order_date`, `User_name`, `image`, `name`, `Category_name` FROM `orders` WHERE 1
                                    $sql=" select * from orders";
                                    $query = $connection->prepare($sql);
                                    $query->execute();
                                    if ($query->rowcount() > 0) {
                                        foreach ($query->fetchAll() as $row) {
                                            $User_id = $row['Order_id'];
                                            $User_name = $row['User_id'];
                                            $image = $row['image'];
                                            $category = $row['Category_name'];
                                            $date = $row['Order_date'];
                                            $meal = $row['name'];
                                            $Active = $row['Active'];
                                    ?>
                                            <tr class="odd gradeX">

                                                <td><?php echo  $User_name; ?></td>
                                                <td><?php echo  $meal; ?></td>
                                                <td><img src="../../../images/<?php echo $image; ?>" alt="<?php echo $image; ?>" style="border: none;
                                                                                                                                                width: 100px;
                                                                                                                                                border-radius: 50px;
                                                                                                                                                height: 100px;
                                                                                                                                                object-fit: fill;
                                                                                                                                                transition: none;">
                                                </td>
                                                <td><?php echo  $category; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td>
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