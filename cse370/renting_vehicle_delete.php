<?php  
include "connection.php";
$delete_vehicle=$_POST['delete_vehicle'];

$delqry2 = "delete from `travel` where `Vehicle_no` = '$delete_vehicle'";
$run2 = mysqli_query($conn, $delqry2);

$delqry1 = "delete from `bus_rent` where `Vehicle_no` = '$delete_vehicle'";
$run1 = mysqli_query($conn, $delqry1);

$delqry = "delete from `renting_vehicle` where `Vehicle_no` = '$delete_vehicle'";
$run = mysqli_query($conn, $delqry);

header("Location: renting_vehicles.php");
?>