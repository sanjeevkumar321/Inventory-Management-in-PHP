<?php 
date_default_timezone_set("Asia/Calcutta");
$insertdate = date("Y-m-d H:i:s");


session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: http://localhost/product-stock/stock/index.php');	
} 



?>