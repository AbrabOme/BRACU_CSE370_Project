<?php
  include "connection.php";
    if (isset($_POST["Enter"])){
        $Route_no = $_POST["Route_no"];
        $Time = $_POST["Time"];
        $Fare = $_POST["Fare"];
        $Departure = $_POST["Departure"];
        $Destination = $_POST["Destination"];
        $Date = $_POST["Date"];
        $Sold_Seats = $_POST["Sold_Seats"];
        $sql = "INSERT INTO `route` (`Route_no`, `Time`,`Fare`, `Departure`, `Destination`, `Date`, `Sold_seat`) 
        VALUES ('$Route_no', '$Time', '$Fare', '$Departure', '$Destination', '$Date', '$Sold_Seats')";
        
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:route.php');
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">

</head>
<body>
  <header><h1>Route Information</h1></header>
  <div class = "row">
    <div class = "col-md-7">
      <form action = "" method="$_GET">
        <input type = "text" name = "search" value = "<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class = "form-control" placeholder="search data">
        <button type= "submit" class = "btn btn-primary"> search </button> 
    </form>    
    </div>
  </div>

<div>
  <table style="border: 1px solid black; width: 100%">
    <thead>
    <tr class = "sami" >
        <th>Route_no</th>
        <th>Time</th>
        <th>Fare</th>
        <th>Departure</th>
        <th>Destination</th>
        <th>Date</th>
        <th>Sold_Seats</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM route WHERE CONCAT(Route_no,Date,Departure,Destination) LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["Route_no"];?></td>
                            <td><?= $items["Time"];?></td>
                            <td><?= $items["Fare"];?></td>
                            <td><?= $items["Departure"];?></td>
                            <td><?= $items["Destination"];?></td>
                            <td><?= $items["Date"];?></td>
                            <td><?= $items["Sold_seat"];?></td>
                            <td>
                <form action="route_update.php" method="post">
                <input type="hidden" name="update_Route_no" value=<?php echo $items["Route_no"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="route_delete.php" method="post">
                 <input type="hidden" name="delete_Route_no" value=<?php echo $items["Route_no"];?>>
 					<input type="submit" value="Delete">
 				</form>
 			    </td>
                            </tr>
                        <?php
                    }
                }
            }
        ?>

    </tbody>

  </table><br>
</div>
  
<table style="border: 1px solid black; width: 100%">
    <thead>
    <tr class = "sami" >
        <th>Route_no</th>
        <th>Time</th>
        <th>Fare</th>
        <th>Departure</th>
        <th>Destination</th>
        <th>Date</th>
        <th>Sold_Seats</th>
    </tr>
    </thead>
<tbody>
<?php 

$sql = "SELECT * from `route`";
$result = mysqli_query($conn,$sql);
if($result){
        while($row = mysqli_fetch_assoc($result)){
            ?>
        
            <tr style="text-align: center;">
                <td> <?php echo $row['Route_no'];?> </td> 
                <td> <?php echo $row['Time'];?> </td>
                <td> <?php echo $row['Fare'];?> </td>
                <td> <?php echo $row['Departure'];?> </td>
                <td> <?php echo $row['Destination'];?> </td>
                <td> <?php echo $row['Date'];?> </td>
                <td> <?php echo $row['Sold_seat'];?> </td> 
                <td>
                <form action="route_update.php" method="post">
 					<input type="hidden" name="update_Route_no" value=<?php echo $row["Route_no"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="route_delete.php" method="post">
 					<input type="hidden" name="delete_Route_no" value=<?php echo $row["Route_no"];?>>
 					<input type="submit" value="Delete">
 				</form>
 			    </td>
            </tr>
        <?php    
        }
        
}

?>


    <tr class = "ome">
        <div class = "container">
            <form method= "post">
        <td> <input type ="text" name = "Route_no" placeholder = "Enter Route_no"></td>
        <td><input type ="time" name = "Time" placeholder = "Enter Time"></td>
        <td><input type ="text" name = "Fare" placeholder = "Enter Fare"></td>
        <td><input type ="text" name = "Departure" placeholder = "Enter Departure"></td>
        <td><input type ="text" name = "Destination" placeholder = "Enter Destination"></td>
        <td><input type ="date" name = "Date" placeholder = "Enter Date"></td>
        <td><input type ="text" name = "Sold_Seats" placeholder = "Enter Sold_Seats"></td>
        <td colspan = "2"><button  name= "Enter">Enter</button></td>
        
        </form>
        </div>
    </tr>
    </tbody>
</table>
<button><a href="admin_page.php">back</a></button>
</body>
</html>