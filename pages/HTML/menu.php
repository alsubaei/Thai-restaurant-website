<?php
				include "header.php";
			?>
    <div class="Order_content">
        <center><br><br><br>
            <h1>Order Menu</h1>
            <table>
                <tbody>
                    <tr>
                        <!-- from database name of category -->
                        <?php
									if(isset($_GET['C_id']))
									{
										$query="select * from category where Category_id=:catid ";
										$stm=$connection->prepare($query);
										$stm->execute(array('catid'=>$_GET['C_id']));
										if($stm->rowCount())
										{
											foreach($stm->fetchAll() as $row)
											{
												$name=$row['Category_name'];
										
								?>
                        <th id="Soup"><?php echo $name ?></th>
                        <?php
										    }
										}
								?>
                    </tr>
                    <tr>
                        <!-- foreach()  -->
                        <?php
										$query="select * from meal where Category_id=:catid ";
										$stm=$connection->prepare($query);
										$stm->execute(array('catid'=>$_GET['C_id']));
										if($stm->rowCount())
										{
											foreach($stm->fetchAll() as $row)
											{
												$meal_id=$row['Meal_id'];
												$meal_image=$row['image'];
												$meal_name=$row['Meal_name'];
												$meal_name_en=$row['E_Meal_name'];
												$meal_cost=$row['Meal_cost'];
									
							  ?>
                        <td>
                            <p><?php echo $meal_name ?><br><?php echo $meal_name_en ?></p>
                            <img src="../../images/<?php echo $meal_image ?>" alt="Tom Yum Goong" width="150" height="150"
                                align="center">
                            <p><?php echo $meal_cost ?>$</p>
                            <a href="?C_id=<?php echo $_GET['C_id'] 
								?>&M_id=<?php echo $meal_id 
								?>&M_name=<?php echo $meal_name
								?>&M_name_e=<?php echo $meal_name_en
								?>&M_image=<?php echo $meal_image
								?>&M_cost=<?php echo $meal_cost
								?>">
                                <button title="add" style="background:#7ec449;" class="Select">Add</button></a>
                        </td>
                        <?php
										}
									}
									else
									{
										echo "No Product in this Category!";	
									}
								}
								else
								{
									echo "Choose Category first from Home page";
								}
							?>
                    </tr>

                </tbody>
            </table>
            <?php
							  if (isset($_GET['C_id'] , $_GET['M_id']) )
							  {
                                    $sql = "insert into temp_order (Meal_id, Category_id, image, name, E_name, cost) VALUES  (?,?,?,?,?,?) ";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($_GET['M_id'], $_GET['C_id'],$_GET['M_image'],$_GET['M_name'],$_GET['M_name_e'],$_GET['M_cost']));
							   }
						 ?>
            
        </center>
    </div>
    <?php
		  	include "footer.php";
		  ?>