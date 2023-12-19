<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>travel</title>
    <link rel="stylesheet" href="vehicle_dis.css">
</head>
<body>
<header><h1>Renting Vehicle And Route Relation</h1></header>
<?php 
require("connection.php");
$sql="SELECT * FROM `travel`";
$result=mysqli_query($conn,$sql);

$sql1="SELECT * FROM `renting_vehicle`";
$vehicle_table=mysqli_query($conn, $sql1);

$sql2="SELECT * FROM `route`";
$route_table=mysqli_query($conn,$sql2);
 ?>
<table>
	<tr>
		<th>Vehicle No</th>
		<th> Route No</th>
		<th></th>
	</tr>
	<?php
	while ($row=mysqli_fetch_assoc($result)) {
	?>
	<tr>
		<td><?php echo$row["Vehicle_no"];?></td>
		<td><?php echo$row["Route_no"];?></td>
		<td>
			<form action="travel_delete.php" method="post">
			<input type="hidden" name="deleted_vehicle" value=<?php echo$row["Vehicle_no"];?>>
			<input type="hidden" name="deleted_route" value=<?php echo$row["Route_no"];?>>
			<input type="submit" value="Delete">
			</form>
		</td>
	</tr>
	<?php
	}?>
	<form action="travel_insert.php" method="post">
	<tr>
		<td>
			<select name="new_vehi_no">
				<?php 
				while ($row1=mysqli_fetch_assoc($vehicle_table)) {
					?>
					<option value=<?php echo $row1["Vehicle_no"]; ?>>
                    <?php echo $row1["Vehicle_no"]; ?></option>
				<?php
				}?>
			</select>
		</td>
		<td>
			<select name="new_route_no">
				<?php while ($row2=mysqli_fetch_assoc($route_table)) {
					?>
					<option value=<?php echo $row2["Route_no"];?>>
                    <?php echo $row2["Route_no"]; ?></option>
				<?php
				}?>
			</select>
		</td>
		<td colspan="2"><input type="submit" value="Enter"></td>
	</tr>
	</form>
</table>
<button><a href="admin_page.php">back</a></button>
</body>
</html>
</body>
</html>