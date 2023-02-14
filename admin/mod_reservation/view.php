<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$id=$_GET['id'];
$mydb->setQuery("SELECT *,roomName,ro.Adults,Children,firstname,lastname,roomImage,address FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id AND reservation_id=".$id);
$cur = $mydb->loadSingleResult();
$image = WEB_ROOT . 'admin/mod_room/'.$cur->roomImage;	


?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Room Details</h3></caption>
			<tr>
				<td width="80"><img src="<?php echo $image; ?>" width="300" height="300" title="<?php echo $roomName; ?>"/></td>
<td>
<p>
<strong>FIRSTNAME: </strong><?php echo $cur->firstname; ?><br/>

<strong>LAST NAME: </strong><?php echo $cur->lastname;?><br/>

 <strong>PHONE: </strong><?php echo $cur->phone;?><br/>

<strong>E-MAIL: </strong><?php echo $cur->email;?><br/>

<strong>ARRIVAL: </strong><?php echo $cur->arrival;?><br/>

<strong>DEPARTURE: </strong><?php echo $cur->departure; ?><br/>

<strong>E-MAIL: </strong><?php echo $cur->email;?><br/><br/>
<b><h4>Status: </h4></b><h4><i><?php echo $cur->status;?></i></h4>
</p>
<?php 
	$stat = $cur->status;
	if($stat == 'pending'){?>
		 <a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
		  <a href="controller.php?action=confirm&res_id=<?php echo $cur->reservation_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>  Confirm</a>
<?php 
	}elseif($stat == 'Confirmed'){
?>
	<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
	    <a href="controller.php?action=cancel&res_id=<?php echo $cur->reservation_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus-sign"></span>  Cancel</a>
	  
<?php
}else{
	?>

<a href="index.php?view=list" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Back</a>
<?php
}

?>
 
</td>
</tr>




			</table>
	
	 </div><!--End of Panel Body-->
 </div><!--End of Main Panel-->  
