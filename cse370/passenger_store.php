<?php
include 'connection.php';
$query= "select * from passenger";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">

</head>
<body>
  <header><h1>Passenger Information</h1></header>

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
        <th>NID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone_no</th>
        <th>Address</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM passenger WHERE CONCAT(NID,Name,Email,Phone_no,Address) LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["NID"];?></td>
                            <td><?= $items["Name"];?></td>
                            <td><?= $items["Email"];?></td>
                            <td><?= $items["Phone_no"];?></td>
                            <td><?= $items["Address"];?></td>
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
        <th>NID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone no</th>
        <th>Address</th>

    </tr>
    </thead>
<tbody>
<?php 

$sql = "SELECT * from `passenger`";
$result = mysqli_query($conn,$sql);
if($result){
        while($row = mysqli_fetch_assoc($result)){
            ?>
        
            <tr style="text-align: center;">
                <td> <?php echo $row['NID'];?> </td> 
                <td> <?php echo $row['Name'];?> </td>
                <td> <?php echo $row['Email'];?> </td>
                <td> <?php echo $row['Phone_no'];?> </td>
                <td> <?php echo $row['Address'];?> </td>
                
            </tr>
            
        <?php    
        }
    }
    ?>
    </tbody>
</table>
<button><a href='admin_page.php'> Back</button>
</body>
