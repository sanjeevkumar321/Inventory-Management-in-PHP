<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $pack					=$_POST['pack'];
  $rate 					= $_POST['rate'];
  $mrp						=$_POST['mrp'];
  $brandName 			= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];

	
	// if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
	// 		if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
	// 			$sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, rate, active, status) 
	// 			VALUES ('$productName', '$url', '$brandName', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";

	// 			if($connect->query($sql) === TRUE) {
	// 				$valid['success'] = true;
	// 				$valid['messages'] = "Successfully Added";	
	// 			} else {
	// 				$valid['success'] = false;
	// 				$valid['messages'] = "Error while adding the members";
	// 			}

	// 		}	else {
	// 			return false;
	// 		}	// /else	
	// 	} // if
	// } // if in_array 	

	// $a="INSERT INTO `product`(`product_name`, `brand_id`, `categories_id`, `pack`, `quantity`, `rate`, `mrp`, `active`, `status`, `entrydate`) VALUES ('$productName', '$brandName', '$categoryName','$pack', '$quantity', '$rate','$mrp', '$productStatus', 1)";	

	$sql = "INSERT INTO `product`(`product_name`, `brand_id`, `categories_id`, `pack`, `quantity`, `rate`, `mrp`, `active`, `status`) VALUES ('$productName', '$brandName', '$categoryName','$pack', '$quantity', '$rate','$mrp', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	

				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}


	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST