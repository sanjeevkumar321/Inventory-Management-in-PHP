<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customerName = $_POST['editcustomerName'];
  	$PhoneNumber = $_POST['editphoneNumber']; 
	$address = $_POST['editAddress']; 
	$editCustomerId = $_POST['editCustomerId']; 

	$sql = "UPDATE customer SET name = '$customerName', phone = '$PhoneNumber' , address='$address' WHERE id = '$editCustomerId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST