<?php
include 'connection.php'; 

if (isset($_POST['departure']) && isset($_POST['destination']) && isset($_POST['date'])) {
  $departure = $_POST['departure'];
  $destination = $_POST['destination'];
  $date = $_POST['date'];

  $q = "SELECT R.Route_no, R.Date, R.Departure, R.Destination, R.Time,
  V.Vehicle_type, V.Total_Seat , V.Vehicle_no, V.cost
  FROM route R, travel T, renting_vehicle V WHERE R.Departure = '$departure' and R.Destination = '$destination' 
  and R.date = '$date' and R.Route_no = T.Route_no and T.Vehicle_no = V.Vehicle_no";
  

$result = mysqli_query($conn,$q);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zombie Express</title>
  <link rel="stylesheet" href="vehicle_dis.css">
</head>
<body>

<header>
  <center><h1>AVAILABLE RENTING VEHICLES</h1></center>
</header>

<table>
  <thead>
    <tr>
    <th>Vehicle No</th>
      <th>Departure</th>
      <th>Destination</th>
      <th>Date</th>
      <th>Time</th>
      <th>Available Seats</th>
      <th>Cost</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row["Vehicle_no"];?></td>
        <td><?php echo $row["Departure"];?></td>
        <td><?php echo $row["Destination"];?></td>
        <td><?php echo $row["Date"];?></td>
        <td><?php echo $row["Time"];?></td>
        <td><?php echo $row["Total_Seat"];?></td>
        <td><?php echo $row["cost"];?></td>
        
        <td>
          <form action="rent.php" method="POST">
            <input type="hidden" name="rou" value="<?php echo $row['Route_no'];?>">
            <input type="hidden" name="veh" value="<?php echo $row['Vehicle_no'];?>">
            <input type="hidden" name="departure" value="<?php echo $row['Departure'];?>">
            <input type="hidden" name="destination" value="<?php echo $row['Destination'];?>">    
            <input type="hidden" name="Fare" value="<?php echo $row['cost'];?>">        
            <button type="submit" name="Purchase">Purchase</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
     <a href ="user.php"><button>Back</button></a> 
</body>
</html>