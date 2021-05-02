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
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
			<li data-target="#demo" data-slide-to="3"></li>
			<li data-target="#demo" data-slide-to="4"></li>
			<li data-target="#demo" data-slide-to="5"></li>
			<li data-target="#demo" data-slide-to="6"></li>
			<li data-target="#demo" data-slide-to="7"></li>
			<li data-target="#demo" data-slide-to="8"></li>
			<li data-target="#demo" data-slide-to="9"></li>
			<li data-target="#demo" data-slide-to="10"></li>
			<li data-target="#demo" data-slide-to="11"></li>
			<li data-target="#demo" data-slide-to="12"></li>
			<li data-target="#demo" data-slide-to="13"></li>
			<li data-target="#demo" data-slide-to="14"></li>
			<li data-target="#demo" data-slide-to="15"></li>
			<li data-target="#demo" data-slide-to="16"></li>
			<li data-target="#demo" data-slide-to="17"></li>
			<li data-target="#demo" data-slide-to="18"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item">
				<img src="images/Cha Yen, Thai style tea.jpg" alt="Thai iced tea" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 display-4 bg-light">Cha Yen</h1>
					<h2><small> <kbd>Thai style tea </kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Gaeng Daeng (Red Curry).jpg" alt="Red Curry" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Gaeng Daeng</h1>
					<h2><small> <kbd> Red Curry</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Gaeng Keow Wan Gai (Green Chicken Curry).jpg" alt="Green Chicken Curry" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Gaeng Keow Wan Gai</h1>
					<h2><small> <kbd> Green Chicken Curry</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item  active">
				<img src="images/Guay Teow (Noodle Soup).jpg" alt="Noodle Soup" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Guay Teow</h1>
					<h2><small> <kbd> Noodle Soup</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Khao Niew Mamuang (Mango Sticky Rice).jpg" alt="Mango Sticky Rice" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Khao Niew Mamuang</h1>
					<h2><small> <kbd> Mango Sticky Rice</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Khao Phat or Khao Pad (Fried Rice).jpg" alt="Fried Rice" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Khao Phat or Khao Pad</h1>
					<h2><small> <kbd> Fried Rice</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Khao Soi (Creamy Coconut Curry Noodle Soup).jpg" alt="Creamy Coconut Curry Noodle Soup" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Khao Soi</h1>
					<h2><small> <kbd> Creamy Coconut Curry Noodle Soup</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Laab (Spicy Salad).jpg" alt="Spicy Salad" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Laab</h1>
					<h2><small> <kbd> Spicy Salad</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Nom Yen - Ice milk with syrup.jpg" alt="iced milk with syrup" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Nom Yen</h1>
					<h2><small> <kbd> iced milk with syrup</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/O-Liang, Thai style coffee.png" alt="Thai iced coffee" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Oliang</h1>
					<h2><small> <kbd> Thai style coffee</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Pad Kee Mao (Drunken Noodles).jpg" alt="Drunken Noodles" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Pad Kee Mao</h1>
					<h2><small> <kbd> Drunken Noodles</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Pad Krapow (Fried Basil).jpg" alt="Fried Basil" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Pad Krapow</h1>
					<h2><small> <kbd> Fried Basil</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Pad Pak Boong (Morning Glory).jpg" alt="Morning Glory" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Pad Pak Boong</h1>
					<h2><small> <kbd> Morning Glory</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Pad See Eiw (Thick Noodle Dish).jpg" alt="Thick Noodle Dish" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Pad See Eiw</h1>
					<h2><small> <kbd> Thick Noodle Dish</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Som Tam (Spicy Green Papaya Salad).jpg" alt="Spicy Green Papaya Salad" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Som Tam</h1>
					<h2><small> <kbd> Spicy Green Papaya Salad</kbd></small></h2>
				</div>
			</div>

			<div class="carousel-item">
				<img src="images/Tom Kha Gai (Chicken in Coconut Soup).jpg" alt="Chicken in Coconut Soup" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Tom Kha Gai</h1>
					<h2><small> <kbd> Chicken in Coconut Soup</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Tom Yum Goong (Spicy Shrimp Soup) .jpg" alt="Spicy Shrimp Soup" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Tom Yum Goong</h1>
					<h2><small> <kbd> Spicy Shrimp Soup</kbd></small></h2>
				</div>
			</div>

			<div class="carousel-item">
				<img src="images/Yum Pla Duk Foo (Crispy Catfish with Green Mango Salad).jpg" alt="Crispy Catfish with Green Mango Salad" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Yum Pla Duk Foo</h1>
					<h2><small> <kbd> Crispy Catfish with Green Mango Salad</kbd></small></h2>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/Pad Thai (Stir-Fried Noodles).jpg" alt="Stir-Fried Noodles" width="1100" height="630">
				<div class="carousel-caption d-none d-sm-block">
					<h1 class="text-warning text-capitalize display-4 bg-light">Pad Thai</h1 text-body>
					<h2><small> <kbd> Stir-Fried Noodles</kbd></small></h2>
				</div>
			</div>
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