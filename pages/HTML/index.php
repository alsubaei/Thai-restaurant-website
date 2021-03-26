	<?php include "header.php"; 
    ?>
	<video width="100%" controls autoplay loop>
  <source src="../../images/resturant.mp4" type="video/mp4" >
</video>   		
          <div class="Main_content">
          	<table >
          		<tbody>
          			<tr>
		          		<th><b>Categories</b></th>
		          	</tr>
		          	<tr>
				  		<?php 
                            $query="select * from category";
							$stm=$connection->prepare($query);
							$stm->execute();
							if($stm->rowCount())
							{
								foreach($stm->fetchAll() as $row)
								{
										$id=$row['Category_id'];
                                   		$name=$row['Category_name'];
                                        $image=$row['image'];
                            ?>
		          		<td>
						  <a href="menu.php?C_id=<?php echo $id ?>" ><img src="../../images/<?php echo $image ?>" alt="new image" ></a>
		          			<a href="menu.php?C_id=<?php echo $id ?>" ><?php echo $name ?></a>
		          		</td>
		          		<?php
								}
							}
		        	  ?>
	          		</tr>
	          	</tbody>
	          </table>
	         
          </div>
		  <?php
		  include "footer.php";
		  ?>