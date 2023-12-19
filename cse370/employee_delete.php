<?php  
include "connection.php";
$delete_nid=$_POST['delete_employee_no'];

$delqry1 = "delete from `admin` where `E_NID` = '$delete_nid'";
$run1 = mysqli_query($conn, $delqry1);

$delqry = "delete from `employee` where `ENID` = '$delete_nid'";
$run = mysqli_query($conn, $delqry);

header("Location: employees.php");
?>