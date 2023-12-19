<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Vehicle</title>
	<link rel="stylesheet" href="design.css">
</head>
<body>

<?php  
include "connection.php";
$new_vehicle=$_POST['update_vehicle'];
$sql="SELECT * FROM `vehicle` WHERE `Vehicle_no` LIKE '$new_vehicle'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<h1>Information of Vehicle <?php echo $row['Vehicle_no'];?></h1>
<form action="vehicle_update_work.php" method="post">
	Registered Area:<input type="text" name="updated_Registered_area" value=<?php echo $row['Registered_Area'];?>><br>
	Total Seat:<input type="text" name="updated_total_seat" value=<?php echo $row['Total_Seat'];?>><br>
	Vehicle Type <select  name="updated_type" >
	<option value="AC">AC</option>
	<option value="NON AC">NON AC</option>
    </select><br>
	<input type="hidden" name="update_vehicle" value=<?php echo $row['Vehicle_no'];?>>
	<input type="submit" Value="SUBMIT">

</form>
</body>
</html>