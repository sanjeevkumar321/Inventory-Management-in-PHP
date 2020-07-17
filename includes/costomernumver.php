<!DOCTYPE html>
<html>
<body>

<?php
$date = date("ym");
$letters = "SY";
$numbers = "012";

$result = "$date$letters$numbers";
echo $result;
echo"<br>";
$a=substr($result,6);
echo $a;
echo"<br>";
//echo $a+1;
echo str_pad($a+1, 3, "0", STR_PAD_LEFT);  // produces "0001"

?> 

</body>
</html>
