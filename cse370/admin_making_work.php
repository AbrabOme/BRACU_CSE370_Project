<?php  
include "connection.php";
$user=$_POST['user'];
$password=$_POST['password'];
$ENID=$_POST['admin'];




$sql=" SELECT * FROM `admin` WHERE `User_ID` LIKE '$user'";
$result=mysqli_query($conn,$sql);
$check=mysqli_num_rows($result)==0;
if ($check) {
    $sql2="INSERT INTO `admin` (`User_ID`, `Password`, `E_NID`) 
    VALUES ('$user', '$password ', '$ENID')";
    $run=mysqli_query($conn, $sql2);
    header("Location: admin_info.php");
}
else{
    header("Location: employees.php");
}

?>