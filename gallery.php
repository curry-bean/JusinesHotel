
<!--End of Header-->
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default">
				
							<div class="panel-body">	
								<div class="col-xs-12 col-sm-12">
									<fieldset>
										<legend><h2 class="text-left">List of Amenities</h2></legend>
										<?php 

											$amen = new Amenities();
											$cur = $amen->listOfamenities();
											foreach($cur as $amenity){
												$image = WEB_ROOT . 'admin/mod_amenities/'.$amenity->amen_image;
												echo '<div style=" float:left;  margin:7px;">';		
												echo '<a href="'.$image.'" rel="prettyPhoto[mwaura]"><img src="'.$image.'" width="100px" height="120px" 
												style="-webkit-border-radius:5px; -moz-border-radius:5px;"  title="'.$amenity->amen_name.'" alt="'.$amenity->amen_name.'" >
												<br>'.$amenity->amen_name.'</a>';
												echo'</div>';
												
											}


										?>

									</fieldset>	
								</div>
							</div>
						</div>	
				
					
				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
	<!--/row-->
