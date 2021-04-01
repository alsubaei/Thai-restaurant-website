	<?php include "header.php";
	?>
	<video width="100%" controls autoplay loop>
		<source src="../../images/resturant.mp4" type="video/mp4">
	</video>
	<div class="container-fluid">

		<div class="row">

			<div class="col-sm">
				<P>
				<h1 class="text-center">Categories</h1>
				</P>
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
					<div class="col-md">
						<a href="menu.php?C_id=<?php echo $id ?>"><img class="rounded-circle img-fluid" style="height:236px" src="../../images/<?php echo $image ?>" alt="new image" width="304" height="236"></a>
						<a class="btn btn-outline-warning"  href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
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