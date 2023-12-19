<?php  
include "connection.php";
$updated_ENID=$_POST['updated_ENID'];
$updated_name=$_POST['updated_name'];
$updated_email=$_POST['updated_email'];
$updated_address=$_POST['updated_address'];
$updated_position=$_POST['updated_position'];
$updated_phone=$_POST['updated_phone'];
$updated_salary=$_POST['updated_salary'];


$sql="UPDATE `employee` SET `Name` = '$updated_name', `Email` = '$updated_email', `Address` = '$updated_address',
 `Position` = '$updated_position', `Phone` = '$updated_phone' ,`Salary`='$updated_salary' WHERE `employee`.`ENID` = '$updated_ENID'";
$result=mysqli_query($conn,$sql);

header("Location: employees.php");
?>