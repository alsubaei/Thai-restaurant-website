<?php
include('header.php');
require('dbconnect.php');
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-dashboard "></i> Control panel</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">
                            <?php
                            $sql = "select * from users";
                            $query = $connection->prepare($sql);
                            $query->execute();
                            echo $query->rowcount();
                            ?>
                            Users
                        </p>
                        <br>
                        <br>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer" style="color: red;">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-tasks"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">
                            <?php
                            $sql = "select * from category";
                            $query = $connection->prepare($sql);
                            $query->execute();
                            echo $query->rowcount();
                            ?> Categories
                        </p>
                        <br>
                        <br>

                    </div>
                    <a href="categories.php">
                        <div class="panel-footer" style="color: #00ce6f;">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">

                            <?php
                            $sql = "select * from meal";
                            $query = $connection->prepare($sql);
                            $query->execute();
                            echo $query->rowcount();
                            ?> Meals
                        </p>
                        <br>
                        <br>
                    </div>
                    <a href="meals.php">
                        <div class="panel-footer" style="color: #a95df0;">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box set-icon" style="background-color: #d80; color:#fff;">
                        <i class="fa fa-table"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">

                            <?php
                            $sql = "select * from orders";
                            $query = $connection->prepare($sql);
                            $query->execute();
                            echo $query->rowcount();
                            ?> Orders
                        </p>
                        <br>
                        <br>
                    </div>
                    <a href="orders.php">
                        <div class="panel-footer" style="color: #d80;">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<?php
include('footer.php');
?>