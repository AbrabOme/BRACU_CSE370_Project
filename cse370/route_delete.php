<?php  
include "connection.php";
$delete_route_no=$_POST['delete_Route_no'];

$delqry4 = "delete from `travel` where `Route_no` = '$delete_route_no'";
$run4 = mysqli_query($conn, $delqry4);

$delqry3 = "delete from `travel_through` where `Route_no` = '$delete_route_no'";
$run3 = mysqli_query($conn, $delqry3);

$delqry2 = "delete from `ticket` where `Route_no` = '$delete_route_no'";
$run2 = mysqli_query($conn, $delqry2);

$delqry = "delete from `route` where `Route_no` = '$delete_route_no'";
$run = mysqli_query($conn, $delqry);

header("Location: route.php");
?>