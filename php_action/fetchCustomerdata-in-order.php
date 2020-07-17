<?php 	

require_once 'core.php';

$customerPhone = $_POST['customerPhone'];

$sql = "SELECT `id`, `name`, `phone`, `address`, `createdate` FROM `customer` WHERE  phone = $customerPhone";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
// echo $customerId;