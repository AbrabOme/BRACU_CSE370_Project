<?php
include "connection.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Rent Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">


</head>

<body>
    <header><h1>Bus Rent Information</h1></header>
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
        <th>ID</th>
        <th>Vehicle No</th>
        <th>Payment Method</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM bus_rent WHERE CONCAT(P_NID, Vehicle_no, Payment_method) LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["P_NID"];?></td>
                            <td><?= $items["Vehicle_no"];?></td>
                            <td><?= $items["Payment_method"];?></td>
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
    <tbody>
    <tr class = "sami" >
        <th>ID</th>
        <th>Vehicle No</th>
        <th>Payment Method</th>
        
        <?php
        $sql_1="SELECT * FROM `bus_rent`";
        $result_1=mysqli_query($conn,$sql_1);
        while ($row=mysqli_fetch_assoc($result_1)) {
        ?>
            <tr>
                <td><?php echo $row["P_NID"];?></td>
                <td><?php echo $row["Vehicle_no"];?></td>
                <td><?php echo $row["Payment_method"];?></td>
            </tr>
        <?php
        }
        ?>
    </tr>
    </thead>
    </tbody>
</table>
</body>
<button><a href='admin_page.php'> Back</button>
</html>