<?php
include('header.php');
require('dbconnect.php');
?>


<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-tasks"></i> Categories</h2>


			</div>
		</div>


		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8">
				<!-- Form Elements -->
				<!-- < ?php -->
				<!-- // ??????????????????????????????????????????????????/??????????????????????????????????????????????????/
				//Edit
				// if (isset($_GET['action'], $_GET['id']) and intval($_GET['id']) > 0) {
				// 	switch ($_GET['action']) {
				// 		case 'Edit':
				// 			$sql = 'select * from category where Category_id=:x1';
				// 			$q = $connection->prepare($sql);
				// 			$q->execute(array("x1" => $_GET['id']));
				// 			if ($q->rowcount() > 0) {
				// 				$row = $q->fetch();
				// 			}
				// 			break;
				// 		case 'Delete':
				// 			$sql = 'delete from category where Category_id=:x1';
				// 			$q = $connection->prepare($sql);
				// 			$q->execute(array("x1" => $_GET['id']));
				// 			if ($q->rowcount() == 1) {
				// 				echo "<h4 class='alert alert-success'><b>One row delete succesfully</br></h4>";
				// 			} else {
				// 				echo "<h4 class='alert alert-danger'><b>no row deleted</br></h4>";
				// 			}
				// 			break;
				// 		default:
				// 			break;
				// 	}
				// }
				// // ??????????????????????????????????????????????????/??????????????????????????????????????????????????/


				// // ??????????????????????????????????????????????????/??????????????????????????????????????????????????/
				// //validation
				// //Insert
				// // ??????????????????????????????????????????????????/??????????????????????????????????????????????????/

				// if ($_SERVER['REQUEST_METHOD'] == 'POST') {


				// 	if (empty($_POST['id'])) {


				// 		if (!empty($_FILES['img']['name'])) {
				// 			$imge_name = $_FILES['img']['name'];
				// 			$size = $_FILES['img']['size'];
				// 			$mytypes = array("png", "jpg", "jpeg", "gif");
				// 			$ext = explode(".", "$imge_name"); //عملها تحويل السلسلة النصية إلى مصفوفة
				// 			$ext = strtolower(end($ext)); //ترجع اخر عنصر في المصفوفة
				// 			if (in_array($ext, $mytypes)) {
				// 				if ($size <= 2000000) {
				// 					if (move_uploaded_file($_FILES['img']['tmp_name'], '../../../images/$imge_name')) {
				// 						$sql = 'insert into category (Category_name, image) values (:x1,:x2)';
				// 						$q = $connection->prepare($sql);
				// 						$q->execute(array("x1" => $_POST['name'], "x2" => $imge_name));
				// 						if ($q->rowcount() > 0) {
				// 							echo "<h4 class='alert alert-success'><b>One row add succesfully</br></h4>";
				// 						} else {
				// 							echo "<h4 class='alert alert-danger'><b>no row inserted</br></h4>";
				// 						}
				// 					}
				// 				} else {
				// 					$errors["size"] = "<span style='color:red'> <b>Maximum 2M</b></span>";
				// 				}
				// 			} else {
				// 				$errors["type"] = "<span style='color:red'> <b>Invalid Type</b></span>";
				// 			}
				// 		} else {
				// 			$errors["image"] = "<span style='color:red'> <b>choose image</b></span>";
				// 		}


				// 		if (!empty($_POST['name'])) {
				// 			if (is_numeric($_POST['name'])) {
				// 				$errors['number'] = "<span style='color:red'> <b>Enter name of category in string format</b></span>";
				// 			}
				// 		} else {
				// 			$errors['name'] = "<span style='color:red'> <b>Enter name of category</b></span>";
				// 		}
				// 	} else {
				// 		// ??????????????????????????????????????????????????/??????????????????????????????????????????????????/


				// 		// ??????????????????????????????????????????????????/??????????????????????????????????????????????????/
				// 		//validation
				// 		//Edit
				// 		// ??????????????????????????????????????????????????/??????????????????????????????????????????????????/
				// 		if (!empty($_FILES['img']['name'])) {
				// 			$imge_name = $_FILES['img']['name'];
				// 			$size = $_FILES['img']['size'];
				// 			$mytypes = array("png", "jpg", "jpeg", "gif");
				// 			$ext = explode(".", "$imge_name"); //عملها تحويل السلسلة النصية إلى مصفوفة
				// 			$ext = strtolower(end($ext)); //ترجع اخر عنصر في المصفوفة
				// 			if (in_array($ext, $mytypes)) {
				// 				if ($size <= 2000000) {
				// 					if (move_uploaded_file($_FILES['img']['tmp_name'], '../../../images/$imge_name')) {
				// 						$sql = 'update category set Category_name=:x1 ,image=:x2 where Category_id=:x3 ';
				// 						$q = $con->prepare($sql);
				// 						$q->execute(array("x1" => $_POST['name'], "x2" => $imge_name, "x3" => $_POST['id']));
				// 						if ($q->rowcount() > 0) {
				// 							echo "<h4 class='alert alert-success'><b>One row modified succesfully</br></h4>";
				// 						} else {
				// 							echo "<h4 class='alert alert-danger'><b>no row modified</br></h4>";
				// 						}
				// 					}
				// 				} else {
				// 					$errors["size"] = "<span style='color:red'> <b>Maximum 2M</b></span>";
				// 				}
				// 			} else {
				// 				$errors["type"] = "<span style='color:red'> <b>Invalid Type</b></span>";
				// 			}
				// 		} else {
				// 			$errors["image"] = "<span style='color:red'> <b>choose image</b></span>";
				// 		}
				// 	}
				// } -->
				
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
                    } elseif (isset($_GET['action']) == 'Edit') {
						// SELECT `Category_id`, `Category_name`, `image`, `Active` FROM `category` WHERE 1
                        $sql = "select * from category where Category_id = :x1 ";
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
                        if (empty($_POST['C_id'])) {
                            $sql = "insert into category (Category_name, image) values (:x1, :x2)";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $name, "x2" => $imge_name));
                            if ($query->rowcount() > 0) {
                                echo "<h4 class='alert alert-success'><b>One row inserted succesfully</br></h4>";
                            } else {
                                echo "<h4 class='alert alert-danger'><b>no row inserted</br></h4>";
                            }
                        } else {
                            $sql = "update category set Category_name=:x1, image=:x2 where Category_id = :x3 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $name, "x2" => $imge_name, "x3" => $_GET['id']));
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
                            $sql = "select * from category where Category_id = :x1 ";
                            $query = $connection->prepare($sql);
                            $query->execute(array("x1" => $_GET['id']));
                            if ($query->rowcount() > 0) {
                                $row = $query->fetch();
                            }
                            break;

                            /////////////////////////////////////////////////////////////////(      delete      )//////////////////////////////////////////////////////////////////////////////////////
						case 'Delete':
							// DELETE FROM `category` WHERE 0
                            $sql = "delete from category where Category_id = :x1 ";
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
                            $sql = "update category set Active = 1 where Category_id = :x1";
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
							// UPDATE `category` SET `Category_id`=[value-1],`Category_name`=[value-2],`image`=[value-3],`Active`=[value-4] WHERE 1
                            $sql = "update category set Active = 0 where Category_id = :x1";
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
				<!-- ??????????????????????????????????????????????????/??????????????????????????????????????????????????/ -->

				<div class="panel panel-default">
					<div class="panel-heading">

						<i class="fa fa-plus-circle"></i> Add New Category
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form role="form" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									  <input type="hidden" name="C_id" value="<?php if (isset($row['Category_id'])) {
                                                                                    echo $row['Category_id'];
                                                                                } ?>">
                                    <label>Name</label>
                                    <input type="text" placeholder="Please Enter your Name " class="form-control" name="name" value="<?php if (isset($row['Category_name'])) {
                                                                                                                                            echo $row['Category_name'];
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
								<label>category image</label><br>
								<?php if (isset($row['image'])) {
								?><img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" style="border: none;
									width: 100px;
									border-radius: 50px;
									height: 100px;
									object-fit: fill;
									transition: none;"><?php
													} ?>
								<input type="file" class="form-control" placeholder="PLease Enter select your image" name="image" value="<?php if (isset($row['image'])) {
																																				echo $row['image'];
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
									<div style="float:right;">
										<button type="submit" class="btn btn-primary">Add Category</button>
										<button type="reset" class="btn btn-danger">Cancel</button>
									</div>
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
						<i class="fa fa-tasks"></i> Categories
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover " id="dataTables-example">
								<thead>
									<tr>
										<th>Number</th>
										<th>Name</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "select * from category ORDER BY Category_id DESC";
									$stm = $connection->prepare($query);
									$stm->execute();
									if ($stm->rowCount()) {
										$i = 1;
										foreach ($stm->fetchAll() as $row) {
											$id = $row['Category_id'];
											$name = $row['Category_name'];
											$image = $row['image'];
											$Active = $row['Active'];
											echo "<tr>";
											echo "<td>$i</td>";
											echo "<td>$name</td>";
											echo "<td><img src='../images/$image' align='center' style='
																										border: none;
																										width: 100px;
																										border-radius: 50px;
																										height: 60px;
																										object-fit: fill;
																										transition: none;
												'></td>";
											echo "<td>";
											echo "<a href='?action=Edit&id=$id' class='btn btn-success'>Edit</a> ";
											echo "<a href='?action=Delete&id=$id' class='btn btn-danger'>Delete</a> ";
											if ($Active == 0) {
												echo "<a href='?action=Active&id=$id' class='btn btn-warning'>Active</a>";
											} else {
												echo "<a href='?action=Unactive&id=$id' class='btn btn-primary'>Unactive</a>";
											}
											echo "</td>";
											echo "</tr>";
											$i++;
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
include('footer.php');
?>