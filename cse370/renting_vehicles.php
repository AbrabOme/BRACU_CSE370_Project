<?php
  include "connection.php";
    if (isset($_POST["Enter"])){
        $ID = $_POST["Vehicle_no"];
        $reg_area = $_POST["Registered_Area"];
        $total_seat = $_POST["Total_Seat"];
        $vehicle_cost = $_POST["cost"];
        $vehicle_type = $_POST["Vehicle_type"];
        $sql = "INSERT INTO `renting_vehicle` (`Vehicle_no`, `Registered_Area`, `Total_Seat`, `cost`,`Vehicle_type`)
        VALUES ('$ID', '$reg_area', '$total_seat', '$vehicle_cost','$vehicle_type');";
        
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:renting_vehicles.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renting Vehicle Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">

</head>
<body>
  <header><h1>Renting Vehicle Information</h1></header>
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
        <th>Vehicle_no</th>
        <th>Registered_Area</th>
        <th>Total_Seat</th>
        <th>cost</th>
        <th>Vehicle Type</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM renting_vehicle WHERE CONCAT(Vehicle_no,Registered_Area,Total_Seat,cost) 
                LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["Vehicle_no"];?></td>
                            <td><?= $items["Registered_Area"];?></td>
                            <td><?= $items["Total_Seat"];?></td>
                            <td><?= $items["cost"];?></td>
                            <td><?= $items["Vehicle_type"];?></td>
                            <td>
                <form action="renting_vehicle_update.php" method="post">
                <input type="hidden" name="update_vehicle" value=<?php echo $items["Vehicle_no"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="renting_vehicle_delete.php" method="post">
                 <input type="hidden" name="delete_vehicle" value=<?php echo $items["Vehicle_no"];?>>
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
        <th>Vehicle No</th>
        <th>Registered Area</th>
        <th>Total Seat</th>
        <th>Cost</th>
        <th>Vehicle Type</th>
        <th colspan = "2"></th>

    </tr>
    </thead>
<tbody>
<?php 

$sql = "SELECT * from `renting_vehicle`";
$result = mysqli_query($conn,$sql);
if($result){
        while($row = mysqli_fetch_assoc($result)){
            ?>
        
            <tr style="text-align: center;">
                <td> <?php echo $row['Vehicle_no'];?> </td> 
                <td> <?php echo $row['Registered_Area'];?> </td>
                <td> <?php echo $row['Total_Seat'];?> </td>
                <td> <?php echo $row['cost'];?> </td>
                <td> <?php echo $row['Vehicle_type'];?> </td>

                <td>
                <form action="renting_vehicle_update.php" method="post">
 					<input type="hidden" name="update_vehicle" value=<?php echo $row["Vehicle_no"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="renting_vehicle_delete.php" method="post">
 					<input type="hidden" name="delete_vehicle" value=<?php echo $row["Vehicle_no"];?>>
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
        <td> <input type ="text" name = "Vehicle_no" placeholder = "Enter Vehicle no"></td>
        <td><input type ="text" name = "Registered_Area" placeholder = "Enter Registered Area"></td>
        <td><input type ="text" name = "Total_Seat" placeholder = "Enter Total Seat"></td>
        <td><input type ="text" name = "cost" placeholder = "Enter Cost"></td>
        <td><select name="Vehicle_type">
				<option value="AC">AC</option>
				<option value="NON AC">NON AC</option>
		</select></td>

        <td colspan = "2"><button name= "Enter">Enter</button></td>
        
        </form>
        </div>
    </tr>
    </tbody>
</table>
<button><a href='admin_page.php'> Back</button>
</body>
</html>