<?php
require("connection.php");
$new_vehi=$_POST['new_vehi_no'];
$new_route=$_POST['new_route_no'];
$pleg="SELECT * FROM `travel` WHERE `Vehicle_no` LIKE '$new_vehi' AND `Route_no` LIKE '$new_route'";
$pleg_result=mysqli_query($conn,$pleg);
$check=mysqli_num_rows($pleg_result)==0;

$sql="INSERT INTO `travel` (`Vehicle_no`, `Route_no`) VALUES ('$new_vehi', '$new_route')";
if ($check) {
	$result=mysqli_query($conn,$sql);
}
header("Location: travel.php");
?>