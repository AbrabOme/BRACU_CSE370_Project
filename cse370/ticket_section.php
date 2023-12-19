<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">
</head>
<body>
    <header><h1>Ticket Information</h1></header>
    <?php
    include ("connection.php");
    $sql_1="SELECT * FROM `ticket`";
    $result_1=mysqli_query($conn,$sql_1);


 ?>
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
        <th>Ticket no</th>
        <th>Total Amount</th>
        <th>Payment method</th>
        <th>Route no</th>
        <th>NID</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM ticket WHERE CONCAT(Ticket_no,Total_Amount,Payment_method,Route_no,P_NID) LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["Ticket_no"];?></td>
                            <td><?= $items["Total_Amount"];?></td>
                            <td><?= $items["Payment_method"];?></td>
                            <td><?= $items["Route_no"];?></td>
                            <td><?= $items["P_NID"];?></td>
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
            <tr class="sami">
                <th>Ticket No</th>
                <th>Total_Amount</th>
                <th>Payment Method</th>
                <th>Route_No</th>
                <th>NID</th>
            </tr>
        </thead>
        <tbody> <!-- Moved the <tbody> tag here -->
        <?php
        while ($row=mysqli_fetch_assoc($result_1)) {
        ?>
            <tr>
                <td><?php echo $row["Ticket_no"];?></td>
                <td><?php echo $row["Total_Amount"];?></td>
                <td><?php echo $row["Payment_method"];?></td>
                <td><?php echo $row["Route_no"];?></td>
                <td><?php echo $row["P_NID"];?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <button><a href='admin_page.php'> Back</a></button> 
</body>
</html>
