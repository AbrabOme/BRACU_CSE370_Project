<?php
require("connection.php");
$delete_route=$_POST['deleted_route'];
$delete_vehicle=$_POST['deleted_vehicle'];

$sql3 = "DELETE FROM `travel` 
WHERE `travel`.`Route_no` ='$delete_route' 
and `travel`.`Vehicle_no`= '$delete_vehicle'";
$result3 = mysqli_query($conn,$sql3);

header("Location: travel.php");
?>