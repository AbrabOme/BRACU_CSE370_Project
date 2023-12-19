<?php  
include "connection.php";
$delete_admin=$_POST['admin_employee_no'];


$delqry = "delete from `admin` where `E_NID` = '$delete_admin'";
$run = mysqli_query($conn, $delqry);

header("Location: employees.php");
?>