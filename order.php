<?php
			include "header.php";	
			// Basic Collapsible
			// Accordion
		?>
    <div class="Main_content">
        <br><br><br>
        <h1 align="center">Order</h1>
        <form id="form">
            <center>
                <div class="div-order" style="padding-bottom: 50px; ">
                    <div id="checkbox">
                        <table>
                            <tbody>
                                <?php
													$query="select * from temp_order";
													$stm=$connection->prepare($query);
													$stm->execute();
													if($stm->rowCount())
													{
														$totle=0;
														//$IDs=0;
														//$i=-1;
														foreach($stm->fetchAll() as $row)
														{
															$id=$row['Id'];
															$name=$row['name'];
															$name_en=$row['E_name'];
															$cost=$row['cost'];
															$image=$row['image'];
															$id_c=$row['Category_id'];
															//$IDs[$i++]=$id;
												?>
                                <tr>
                                    <td style="padding: 30px 0px;">
                                        <span><?php 
												echo "kjjjgjtgjjg";
												echo $id?> </span>
                                        <!-- <span><?php echo $name_c?> </span> -->
                                        <img src="<?php echo $image ?>" alt="Tom Yum Goong" width="150" height="150"
                                            align="center" class="order_image">
                                        <span><?php echo $name?> <?php echo $name_en?></span>
                                        <span> <?php echo $cost ?>$</span>

                                        <!-- <a href="" style=" display:inline"><button title="sure" style="background:#7ec449;">sure</button></a> -->
                                        <a href="?id=<?php echo $id ?>" style=" display:inline"><button title="remove"
                                                style="background:#d64747;">delete</button></a>
                                        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
													++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
													++++++++++++++++++++++++++++++++++++++++++++++
													++++++++++++++++
													+++++++++
													+++++
													++ -->
                                    </td>
                                    <?php
												$totle +=$cost;
															}
														
												?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <p>Totle is <?php echo $totle?>$</p>
                    <a href="?totle=<?php echo $totle ?>"><button title="send"
                            style="background:#7ec449;">Pay</button></a>
                    <!-- <a href="?All=<?php //echo $id ?><button title="remove" style="background:#d64747;">remove</button></a> -->
                    <?php
													}
												else
												{
													echo "<h3>Choose Meal first from Menu page</h3>";
												}
						?>
                </div>
                <?php
                    if (isset( $_GET['ID'])) {
						echo "Welcome";
                         $stm = $con->prepare("delete from temp_order where Id=:catid");
						 $stm->execute(array("catid"=> $_GET['ID']));
					}
					if(isset($_GET['']))
					{
						$sql = "insert into orders (temp_order_id, Order_date, Order_time, Order_price, User_id) VALUES  (?,?,?,?,?,?) ";
						$stm = $con->prepare($sql);
						$stm->execute(array($_GET['M_id'], $_GET['C_id'],$_GET['M_image'],$_GET['M_name'],$_GET['totle'],));
				   
					}
                    ?>

            </center>
        </form>
    </div>
    <?php
		  	include "footer.php";
		  ?>