<?php
include "header.php";
?>
<div class="container-fluid">
	<center><br><br><br>
		<h1 class="text-center">Order Menu</h1>
		<!-- <table><tbody> -->
		<!-- <tr> -->
		<div class="row"><br></div>
		<!-- from database name of category -->
		<?php
		if (isset($_GET['C_id'])) {
			$query = "select * from category where Category_id=:catid ";
			$stm = $connection->prepare($query);
			$stm->execute(array('catid' => $_GET['C_id']));
			if ($stm->rowCount()) {
				foreach ($stm->fetchAll() as $row) {
					$name = $row['Category_name'];
		?>
					<!-- <th id="Soup"><?php #echo $name 
										?></th> -->
					<div class="row">
						<div class="col">
							<h3><?php echo $name ?></h3>
						</div>
					</div>
			<?php
				}
			}
			?>
			<!-- </tr> -->
			<div class="row"><br></div>
			<!-- <tr> -->
			<!-- foreach()  -->
			<?php
			$query = "select * from meal where Category_id=:catid ";
			$stm = $connection->prepare($query);
			$stm->execute(array('catid' => $_GET['C_id']));
			if ($stm->rowCount()) {
			?>
				<div class="row">
					<?php
					foreach ($stm->fetchAll() as $row) {
						$meal_id = $row['Meal_id'];
						$meal_image = $row['image'];
						$meal_name = $row['Meal_name'];
						$meal_name_en = $row['E_Meal_name'];
						$meal_cost = $row['Meal_cost'];
					?>
						<!-- <td> -->
						<div class="col-lg-4">
							<div class="card-deck">
								<div class="card">
									<div class="card-body">
										<p class="card-text"><?php echo $meal_name ?></p>
										<p class="card-text"><?php echo $meal_name_en ?></p>
										<img class="rounded-circle img-fluid" style="height:276px" src="../../images/<?php echo $meal_image ?>" alt="Tom Yum Goong" width="344" height="276">
										<p class="card-text"><?php echo $meal_cost ?>$</p>
										<a href="?C_id=<?php echo $_GET['C_id']
														?>&M_id=<?php echo $meal_id
															?>&M_name=<?php echo $meal_name
																				?>&M_name_e=<?php echo $meal_name_en
																							?>&M_image=<?php echo $meal_image
																										?>&M_cost=<?php echo $meal_cost
																													?>" class="btn btn-warning stretched-link">Add<span class="badge">+</span></a>
									</div>
								</div>
							</div>
							<br>
						</div>
					<?php
					}
					?>
				</div>
		<?php
			} else {
				echo "<p class='text-center'>No Product in this Category!</p>";
			}
		} else {
			echo "<p class='text-center'>Choose Category first from Home page</p>";
		}
		?>
		<!-- </tr> -->
		<!-- </tbody></table> -->
		<?php
		if (isset($_GET['C_id'], $_GET['M_id'])) {
			$sql = "insert into temp_order (Meal_id, Category_id, image, name, E_name, cost) VALUES  (?,?,?,?,?,?) ";
			$stm = $connection->prepare($sql);
			$stm->execute(array($_GET['M_id'], $_GET['C_id'], $_GET['M_image'], $_GET['M_name'], $_GET['M_name_e'], $_GET['M_cost']));
		}
		?>
</div>
<?php
include "footer.php";
?>