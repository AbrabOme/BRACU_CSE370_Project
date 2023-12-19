<?php  
include "connection.php";
$updated_Route_no=$_POST['updated_Route_no'];
$updated_time=$_POST['updated_time'];
$updated_fare=$_POST['updated_fare'];
$updated_Departure=$_POST['updated_Departure'];
$updated_Destination=$_POST['updated_Destination'];
$updated_date=$_POST['updated_date'];
$updated_Sold_seat=$_POST['updated_Sold_seat'];


$sql="UPDATE `route` SET `Route_no` = '$updated_Route_no', `Time` = '$updated_time',`Fare` = '$updated_fare', `Departure` = '$updated_Departure',
 `Destination` = '$updated_Destination', `Date` = '$updated_date' ,`Sold_seat`='$updated_Sold_seat' WHERE `route`.`Route_no` = '$updated_Route_no'";
$result=mysqli_query($conn,$sql);

header("Location: route.php");
?>