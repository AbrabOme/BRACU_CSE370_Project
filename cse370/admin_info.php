
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">

</head>
<body>
  <header><h1>Admin Information</h1></header>

<table style="border: 1px solid black; width: 100%">
    <thead>
    <tr class = "sami" >
        <th>Employee ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Designation</th>
        <th>Phone</th>
        <th>Salary</th>
        <th colspan = "2"></th>
    </tr>
    </thead>
<tbody>
<?php 
require "connection.php";

$sql = "select E.ENID, E.Name, E.Email, E.Address, E.Position ,E.phone,E.Salary
 from `employee` E where E.ENID in (select A.E_NID from `admin` A)";
$lst_employee=mysqli_query($conn,$sql);
$result = mysqli_query($conn,$sql);
if($result){
        while($row = mysqli_fetch_assoc($result)){
            ?>
        
            <tr style="text-align: center;">
                <td> <?php echo $row['ENID'];?> </td> 
                <td> <?php echo $row['Name'];?> </td>
                <td> <?php echo $row['Email'];?> </td>
                <td> <?php echo $row['Address'];?> </td>
                <td> <?php echo $row['Position'];?> </td>
                <td> <?php echo $row['phone'];?> </td>
                <td> <?php echo $row['Salary'];?> </td> 
                <td>
                <form action="admin_update.php" method="post">
 					<input type="hidden" name="update_employee_no" value=<?php echo $row["ENID"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>

                <td>
                 <form action="employee_admin_deleting.php" method="post">
 					<input type="hidden" name="admin_employee_no" value=<?php echo $row["ENID"];?>>
 					<input type="submit" value="Remove Admin">
                
 				</form>
 			</td>
            </tr>
            
        <?php    
        }
        
}

?>


    </tbody>
</table>
<button><a href='admin_page.php'> Back</button>
</body>
</html>