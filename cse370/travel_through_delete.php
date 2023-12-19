<?php
require("connection.php");
$delete_route=$_POST['deleted_route'];
$delete_vehicle=$_POST['deleted_vehicle'];

$sql3 = "DELETE FROM `travel_through` 
WHERE `travel_through`.`Route_no` ='$delete_route' 
and `travel_through`.`Vehicle_no`= '$delete_vehicle'";
$result3 = mysqli_query($conn,$sql3);

header("Location: travel_through.php");
?>