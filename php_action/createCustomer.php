<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customerName = $_POST['customerName'];
  	$PhoneNumber = $_POST['PhoneNumber']; 
	$address = $_POST['address']; 

	$dupe = mysqli_query($connect,"SELECT * FROM `customer` WHERE  `phone`='$PhoneNumber'") or die (mysql_error());
	$num_rows = mysqli_num_rows($dupe);
	if ($num_rows > 0) {
				$valid['success'] = false;
				$valid['messages'] = "Error! Already in our database! Try Another Mobile Number";
	}
	else{

		$sql = "INSERT INTO `customer`(`name`, `phone`, `address`) VALUES ('$customerName','$PhoneNumber','$address')";

			if($connect->query($sql) === TRUE) {
			 	$valid['success'] = true;
				$valid['messages'] = "Successfully Added";	
			} else {
			 	$valid['success'] = false;
			 	$valid['messages'] = "Error while adding the members";
			}
		

		}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST