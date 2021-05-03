	<?php include "header.php";
	?>
	<!-- <video width="100%" controls autoplay loop>
		<source src="images/resturant.mp4" type="video/mp4">
	</video> -->

	<head>
		<style>
			/* Make the image fully responsive */
			.carousel-inner img {
				width: 100%;
				object-fit: cover;
			}
		</style>
	</head>
	<!-- beginning of  Carousel
A slideshow component for cycling through elements—images or slides of text—like a carousel.
  -->
	<div id="demo" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<?php
			$query = "select * from meal";
			$stm = $connection->prepare($query);
			$stm->execute();
			if ($stm->rowCount()) {
				for ( $r=1; $r <=  $stm->rowCount(); $r++) {
			?>
			<li data-target="#demo" data-slide-to="1"></li>
			<?php
				}
			}
			?>
		</ol>
		<div class="carousel-inner">
		<?php
			$query = "select * from meal where Active = :x1 ORDER BY RAND()
			LIMIT 10;";
			$stm = $connection->prepare($query);
			$stm->execute(array("x1"=>"1"));
			if ($stm->rowCount()) {
				foreach ($stm->fetchAll() as $row) {
					$Meal_name = $row['Meal_name'];
					$E_Meal_name = $row['E_Meal_name'];
					$image = $row['image'];
			?>
			<div class="carousel-item">
				<img src="images/<?php echo $image; ?>" alt="<?php echo $E_Meal_name; ?>" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 display-4 bg-light"><?php echo $Meal_name; ?></h1>
					<h2><small> <kbd><?php echo $E_Meal_name; ?> </kbd></small></h2>
				</div>
			</div>
			<?php
				}
			}
			?>
		</div>
		<a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#demo" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- closing of Carousel  -->
	<div class="container-fluid">

		<div class="row">

			<div class="col-sm">
				<p>
				<h1 class="text-center">Categories</h1>
				</p>
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
						<a href="menu.php?C_id=<?php echo $id ?>"><img class="rounded-circle img-fluid" style="height:236px" src="images/<?php echo $image ?>" alt="images/<?php echo $image ?>" width="304" height="236"></a>
						<a class="btn btn-outline-warning" href="menu.php?C_id=<?php echo $id ?>"><?php echo $name ?></a>
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