<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'delete' :
	dbDELETE();
	break;
	
	case 'deleteOne' :
	dbDELETEONE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	}
function doCheckout(){

	$id = $_GET['id'];

	$res = new Reservation();
	$res->status = 'Checkedout';
	$res->update($id); 
					
	message("Reservation Upadated successfully!", "success");
	redirect('index.php');

}
function doCheckin(){
$id = $_GET['id'];

$res = new Reservation();
$res->status = 'Checkedin';
$res->update($id); 
				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}


function doCancel(){
$id = $_GET['res_id'];

$res = new Reservation();
$res->status = 'Cancelled';
$res->update($id); 
				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}
function doConfirm(){
$id = $_GET['res_id'];

$res = new Reservation();
$res->status = 'Confirmed';
$res->update($id); 
				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}	
/*function dbMODIFY(){
$id = $_GET['id'];
$arrival=$_POST['arrival'];
$departure=$_POST['departure'];
$adults=$_POST['adults'];
$child=$_POST['child'];
$sql="UPDATE reservation SET arrival='$arrival', departure='$departure',adults='$adults',child='$child' WHERE reservation_id=".$id;
$result = dbQuery($sql);
if(!$result)
{
  die('Could not modify record: ' . mysql_error());
} else {

header('Location:index_resv.php');}
}
*/
/*function dbDELETEONE(){
	$del_id = $_GET['id'];
	$sql = "DELETE FROM reservation  WHERE reservation_id={$del_id}";
	$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
  header('Location:index_resv.php?view=list');
  }*/
?>