
<div class="container">
<div class="panel panel-primary">
			<div class="panel-body">
<form  method="post" action="processreservation.php?action=delete">
	<table id="example" class="table table-striped" cellspacing="0">
<thead>
<tr>
<td>No</td>	

<td width="90"><strong>Name</strong></td>
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td width="80"><strong>Confirmation</strong></td>
<td width="80"><strong>Arrival</strong></td>
<td width="70"><strong>Departure</strong></td>
<td width="80"><strong>Type</strong></td>
<td width="80"><strong>Nights</strong></td>
<td width="80"><strong>Status</strong></td>
<td width="100"><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php
//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");
$mydb->setQuery("SELECT * , roomName, firstname, lastname
FROM reservation re, room ro, guest gu, roomtype rt
WHERE re.roomNo = ro.roomNo
AND ro.`typeID` = rt.`typeID` 
AND re.guest_id = gu.guest_id");
$cur = $mydb->loadResultList();
				  			
foreach ($cur as $result) {
?>
<tr>
<td width="5%" align="center"></td>
<td><?php echo $result->firstname." ".$result->lastname; ?></td>
<td><?php echo $result->confirmation; ?></td>
<td><?php echo $result->arrival; ?></td>
<td><?php echo $result->departure; ?></td>
<!--<td><?php echo $result->roomName; ?></td>-->
<td><?php echo $result->typename; ?></td>
<td><?php echo dateDiff($result->arrival,$result->departure); ?></td>
<td><?php echo $result->status; ?></td> 
<!--<td><a class="btn btn-default toggle-modal-reserve" href="#reservationr<?php echo $result->reservation_id; ?>" role="button" >View</a></td>-->
<td >
	<?php 
		if($result->status == 'Confirmed'){ ?>
		<a class="cls_btn" id="<?php echo $result->reservation_id; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." ><i class="icon-edit">test</a>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkin&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" ><i class="icon-edit">Check in</a>
		<?php
		}elseif($result->status == 'Checkedin'){
	?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="controller.php?action=checkout&id=<?php echo $result->reservation_id; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Check out</a>
	<?php
		}else{
			?>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a>
			<a href="index.php?view=view&id=<?php echo $result->reservation_id; ?>" class="btn btn-success btn-xs" disabled="disabled"><i class="icon-edit">Check in</a>
	<?php
		}

	?>
	
	
</td>

<?php }
?>
  
		<div class="modal fade" id="profile" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						

						<div class="alert alert-info">Profile:</div>
					</div>

					<form action="#"  method=
					"post">
						<div class="modal-body">
					
												
								<div id="display">
									
										<p>ID : <div id="infoid"></div></p><br/>
											Name : <div id="infoname"></div><br/>
											Email Address : <div id="Email"></div><br/>
											Gender : <div id="Gender"></div><br/>
											Birthday : <div id="bday"></div>
										</p>
										
								</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type=
							"button">Close</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</table>

</form>
</div>
</div>