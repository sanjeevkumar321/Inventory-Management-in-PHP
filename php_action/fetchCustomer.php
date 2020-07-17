<?php 	

require_once 'core.php';

$sql = "SELECT  `id`,`name`, `phone`, `address` FROM customer ";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 
$slno=0;
 while($row = $result->fetch_array()) {
 	$slno +=1;
 	$customerId = $row[0];
 	// active 
 	$customerName=$row[1];
 	$phone=$row[2];
 	$address=$row[3];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editCustomerModalBtn" data-target="#editCusotmerModal" onclick="editCustomer('.$customerId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCustomerModal" id="removeCustomerModalBtn" onclick="removeCustomer('.$customerId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array(
 		$slno, 		
 		$row[1], 		
 		$row[2],
 		$row[3],
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);