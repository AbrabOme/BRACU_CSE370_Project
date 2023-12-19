<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Route</title>
	<link rel="stylesheet" href="design.css">
</head>
<body>

<?php  
include "connection.php";
$new_route=$_POST['update_Route_no'];

$sql="SELECT * FROM `route` WHERE `Route_no` LIKE '$new_route'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<h1>Information of Route <?php echo $row['Route_no'];?></h1>
<form action="route_update_work.php" method="post">
Route_no:<input type="text" name="updated_Route_no" value=<?php echo $row['Route_no'];?>><br>
Date:<input type="time" name="updated_time" value=<?php echo $row['Time'];?>><br>
Fare:<input type="text" name="updated_fare" value=<?php echo $row['Fare'];?>><br>
Departure:<input type="text" name="updated_Departure" value=<?php echo $row['Departure'];?>><br>
Destination:<input type="text" name="updated_Destination" value=<?php echo $row['Destination'];?>><br>
Pickup_Time:<input type="date" name="updated_date" value=<?php echo $row['Date'];?>><br>
Sold_seat:<input type="text" name="updated_Sold_seat" value=<?php echo $row['Sold_seat'];?>><br>
	<input type="hidden" name="updated_Route_no" value=<?php echo $row['Route_no'];?>>
	<input type="submit" Value="SUBMIT">

</form>
</body>
</html>