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
$new_employee=$_POST['update_employee_no'];

$sql="SELECT * FROM `employee` WHERE `ENID` LIKE '$new_employee'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<h1>Information of Employee <?php echo $row['ENID'];?></h1>
<form action="employee_update_work.php" method="post">
	Name:<input type="text" name="updated_name" value=<?php echo $row['Name'];?>><br>
	Email:<input type="text" name="updated_email" value=<?php echo $row['Email'];?>><br>
	Address:<input type="text" name="updated_address" value=<?php echo $row['Address'];?>><br>
	Position:<input type="text" name="updated_position" value=<?php echo $row['Position'];?>><br>
	Phone:<input type="text" name="updated_phone" value=<?php echo $row['phone'];?>><br>
	Salary:<input type="text" name="updated_salary" value=<?php echo $row['Salary'];?>><br>
	<input type="hidden" name="updated_ENID" value=<?php echo $row['ENID'];?>>
	<input type="submit" Value="SUBMIT">

</form>
</body>
</html>