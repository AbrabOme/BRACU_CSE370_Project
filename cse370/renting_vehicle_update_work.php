<?php  
include "connection.php";
$updated_Vehicle_no=$_POST['update_vehicle'];
$updated_Registered_area=$_POST['updated_Registered_area'];
$updated_total_seat=$_POST['updated_total_seat'];
$updated_cost=$_POST['updated_cost'];
$updated_type=$_POST['updated_type'];



$sql="UPDATE `renting_vehicle` SET `Vehicle_no` = '$updated_Vehicle_no', `Registered_Area` = '$updated_Registered_area', `Total_Seat` = '$updated_total_seat',
 `cost` = '$updated_cost',`Vehicle_type` = '$updated_type'WHERE `renting_vehicle`.`Vehicle_no` = '$updated_Vehicle_no'";
$result=mysqli_query($conn,$sql);

header("Location: renting_vehicles.php");
?>