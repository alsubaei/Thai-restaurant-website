	<?php include "header.php";
	?>
	<video width="100%" controls autoplay loop>
		<source src="../../images/resturant.mp4" type="video/mp4">
	</video>
	<div class="container-fluid">

		<div class="row">

			<div class="col-sm">
				<b class="Title_of_Category">Categories</b>
			</div>
		</div>
		<div class="row">

			<?php
			$query = "select * from category";
			$stm = $connection->prepare($query);
			$stm->execute();
			if ($stm->rowCount()) {
				foreach ($stm->fetchAll() as $row) {
					$id = $row['Category_id'];
					$name = $row['Category_name'];
					$image = $row['image'];
			?>
					<div class="col-sm">
						<a href="menu.php?C_id=<?php echo $id ?>"><img class="Image_of_Category" src="../../images/<?php echo $image ?>" alt="new image"></a>
						<a href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
					</div>

			<?php
				}
			}
			?>
		</div>

	</div>
	<?php
	include "footer.php";
	?>