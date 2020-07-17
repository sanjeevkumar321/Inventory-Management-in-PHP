<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`,
 `discount`, `grand_total`, `paid`, `due` FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];


$orderItemSql = "SELECT order_item.product_id, order_item.quantity,  order_item.free,  order_item.pack,  order_item.batch,  order_item.gst,  order_item.exp, order_item.dis,  order_item.mrp,  order_item.rate, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '
 </head>
 <style type="text/css">


 body{
  font-size: 11px;
}
.borderless tr {
    border: none;
}
  .table>tbody>tr>td{
        padding: 5px;
  }
  address {
    margin-bottom: 2px;
  }
  .panel-body {
    padding: 5px;
}

<body style="font-size: 11px">



</style>
 <div class="">
    <div class="panel panel-default mb-5">
        <div class="panel-heading">
            <div class="row">
              <div class="col-md-10 col-md-offset-2">
                <div class="col-md-4 pull-left">
                    <strong>INVOICE: ANU 123</strong><br>
                    Created: 02/04/2019 <br>
                    Due: 05/04/2019
                </div>
                <!-- div class="col-md-4 center">
                   
                    <center><h4>XYZ Shopping</h4></center>
                </div> -->
                <div class="col-md-4 pull-right">
                    STATUS: Cancelled
                </div>
              </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Supplier:
                    </div>
                    <div class="panel-body">
                      <address>
                        <strong>SUN LIFE CCARE</strong> <br>
                        SAMANTA BIHAR,BHUBANESWAR<br>
                        21-ODISHA<br>
                        Adress: Aleea Moldovita, Nr. <br>
                        Phone: 0773990706 <br>
                        
                        </address>
                    </div>
                </div>                
            </div>
            <div class="col-sm-6 col-lg-6 text-right pull-right">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    Client:
                  </div>
                  <div class="panel-body">
                    <address>
                        <strong>Test Company srl</strong> <br>
                        Reg. com.: rgdsfgsdf2 -3 <br>
                        CIF: rgdsfgsdf2 -3 <br>
                        Adress: Aleea Moldovita, Nr. 6, Bl. Em3  <br>
                        Phone: 0773990706 <br>
                        
                        </address>
                  </div>
                </div>
            </div>
          <table class="table table-bordered">
            <thead>
              <tr>
      <th>No.</th>
      <th>Product</th>
      <th>Rate</th>
      <th>Qty.</th>
      <th>+Free</th>
      <th>Pack</th>
      <th>Batch</th>
      <th>Rate</th>
      <th>Exp</th>
      <th>MRP</th>
      <th>SGST%</th>
      <th>CGST%</th>
      <th>Dis%</th>
      <th>Amount</th>
      <th>Net Amount</th>
      <th class="text-right">Amount  </th>
              </tr>
            </thead>
            <tbody>
              <tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[11].'</th>
				<th>'.$row[8].'</th>
				<th>'.$row[1].'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[3].'</th>
				<th>'.$row[4].'</th>
				<th>'.$row[9].'</th>
				<th>'.$row[7].'</th>
				<th>'.$row[6].'</th>
				<th>'.$row[8].'</th>
				<th>'.$row[5].'</th>
				<th>'.$row[5].'</th>
				
				<th>nan</th>
				<th>nan</th>
				<th>'.$row[10].'</th>
			</tr>
			';
		$x++;
		} // /while






$table .='</tbody>
          </table>
          <div class="row justify-content-end">
            <div class="col-md-6">
              Currency: GBP <br>
              VAT: 19% <br>
              Expiration date: <br>
              Made by: Ana Gheorghe <br>
              Delivered in 21/10/2016 at 18:02 <br>
            </div>
            <div class="col-md-6">
              <table class="table borderless">
                <tbody>
                  <tr>
                    <th scope="row" class="text-right">Subtotal</th>
                    <th class="text-right">59,000</th>
                  </tr>
                  <tr>
                    <th scope="row" class="text-right">VAT 19%</th>
                    <th class="text-right">11,210</th>
                  </tr>
                  <tr>
                    <th scope="row" class="text-right">TOTAL</th>
                    <th class="text-right">70,210</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer" style="height: 5rem;">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-6">
                    Supplier Signature
                </div>
                <div class="col-md-6">
                    Client Signature
                </div>
            </div>
        </div>
    </div>
</div>';












// 		$table .= '<tr>
// 			<th></th>
// 		</tr>

// 		<tr>
// 			<th></th>
// 		</tr>

// 		<tr>
// 			<th>Sub Amount</th>
// 			<th>'.$subTotal.'</th>			
// 		</tr>

// 		<tr>
// 			<th>VAT (13%)</th>
// 			<th>'.$vat.'</th>			
// 		</tr>

// 		<tr>
// 			<th>Total Amount</th>
// 			<th>'.$totalAmount.'</th>			
// 		</tr>	

// 		<tr>
// 			<th>Discount</th>
// 			<th>'.$discount.'</th>			
// 		</tr>

// 		<tr>
// 			<th>Grand Total</th>
// 			<th>'.$grandTotal.'</th>			
// 		</tr>

// 		<tr>
// 			<th>Paid Amount</th>
// 			<th>'.$paid.'</th>			
// 		</tr>

// 		<tr>
// 			<th>Due Amount</th>
// 			<th>'.$due.'</th>			
// 		</tr>
// 	</tbody>
// </table>
//  ';


$connect->close();

echo $table;