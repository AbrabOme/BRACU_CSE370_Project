<?php
  include "connection.php";
    if (isset($_POST["Enter"])){
        $ID = $_POST["ID"];
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Address = $_POST["Address"];
        $Designation = $_POST["Designation"];
        $Phone = $_POST["Phone"];
        $Salary = $_POST["Salary"];
        $sql = "INSERT INTO `employee` (`ENID`, `Name`, `Email`, `Address`, `Position`, `phone`, `Salary`) 
        VALUES ('$ID', '$Name', '$Email', '$Address', '$Designation', '$Phone', '$Salary');";
        
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:employees.php');
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <link rel="stylesheet" href="vehicle_dis.css">

</head>
<body>
  <header><h1>Employee Information</h1></header>
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
        <th>Employee ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Designation</th>
        <th>Phone</th>
        <th>Salary</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include "connection.php";
            if(isset($_GET['search']))
            {
                $filtervalues = $_GET['search'];
                $qur = "SELECT * FROM employee WHERE CONCAT(ENID,Name,Email,Address,Position) LIKE '%$filtervalues%'";
                $qurr_run = mysqli_query($conn,$qur);
                if(mysqli_num_rows($qurr_run) > 0)
                {
                    foreach($qurr_run as $items)
                    {
                        ?>
                            <tr style="text-align: center;">
                            <td><?= $items["ENID"];?></td>
                            <td><?= $items["Name"];?></td>
                            <td><?= $items["Email"];?></td>
                            <td><?= $items["Address"];?></td>
                            <td><?= $items["Position"];?></td>
                            <td><?= $items["phone"];?></td>
                            <td><?= $items["Salary"];?></td>
                            <td>
                <form action="employee_update.php" method="post">
                <input type="hidden" name="update_employee_no" value=<?php echo $items["ENID"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="employee_delete.php" method="post">
                 <input type="hidden" name="delete_employee_no" value=<?php echo $items["ENID"];?>>
 					<input type="submit" value="Delete">
 				</form>
 			    </td>
                 <td>
                 <form action="employee_admin_making.php" method="post">
 					<input type="hidden" name="admin_employee_no" value=<?php echo $items["ENID"];?>>
 					<input type="submit" value="Make Admin">
                
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
        <th>Employee ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Designation</th>
        <th>Phone</th>
        <th>Salary</th>
        <th colspan = "3"></th>
    </tr>
    </thead>
<tbody>
<?php 

$sql = "select E.ENID, E.Name, E.Email, E.Address, E.Position ,E.phone,E.Salary
 from `employee` E where E.ENID not in (select A.E_NID from `admin` A)";
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
                <form action="employee_update.php" method="post">
 					<input type="hidden" name="update_employee_no" value=<?php echo $row["ENID"];?>>
 					<input type="submit" value="Update">
 				</form>
                </td>
                <td>
 				<form action="employee_delete.php" method="post">
 					<input type="hidden" name="delete_employee_no" value=<?php echo $row["ENID"];?>>
 					<input type="submit" value="Delete">
 				</form>
        </td>
                <td>
                 <form action="employee_admin_making.php" method="post">
 					<input type="hidden" name="admin_employee_no" value=<?php echo $row["ENID"];?>>
 					<input type="submit" value="Make Admin">
                
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
        <td> <input type ="text" name = "ID" placeholder = "Enter ID"></td>
        <td><input type ="text" name = "Name" placeholder = "Enter Name"></td>
        <td><input type ="text" name = "Email" placeholder = "Enter Email"></td>
        <td><input type ="text" name = "Address" placeholder = "Enter Addess"></td>
        <td><input type ="text" name = "Designation" placeholder = "Enter Designation"></td>
        <td><input type ="text" name = "Phone" placeholder = "Enter Phone"></td>
        <td><input type ="text" name = "Salary" placeholder = "Enter Salary"></td>
        <td colspan = "3"><button name= "Enter">Enter</button></td>
        
        </form>
        </div>
    </tr>
    </tbody>
</table>
<button><a href='admin_page.php'> Back</button>
</body>
</html>