<?php  
include "connection.php";
$updated_Vehicle_no=$_POST['update_vehicle'];
$updated_Registered_area=$_POST['updated_Registered_area'];
$updated_total_seat=$_POST['updated_total_seat'];
$updated_type=$_POST['updated_type'];



$sql="UPDATE `vehicle` SET `Vehicle_no` = '$updated_Vehicle_no', `Registered_Area` = '$updated_Registered_area', `Total_Seat` = '$updated_total_seat',
 `Vehicle_type` = '$updated_type' WHERE `vehicle`.`Vehicle_no` = '$updated_Vehicle_no'";
$result=mysqli_query($conn,$sql);

header("Location: vehicles.php");
?>