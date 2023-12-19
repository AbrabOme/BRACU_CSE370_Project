<?php  
include "connection.php";
$delete_vehicle_no=$_POST['delete_vehicle'];

$delqry1 = "delete from `travel_through` where `Vehicle_no` = '$delete_vehicle_no'";
$run1 = mysqli_query($conn, $delqry1);

$delqry = "delete from `vehicle` where `Vehicle_no` = '$delete_vehicle_no'";
$run = mysqli_query($conn, $delqry);

header("Location: vehicles.php");
?>