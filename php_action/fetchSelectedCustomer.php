<?php 	

require_once 'core.php';

$customerId = $_POST['customerId'];

$sql = "SELECT `id`, `name`, `phone`, `address`, `createdate` FROM `customer` WHERE  id = $customerId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
// echo $customerId;