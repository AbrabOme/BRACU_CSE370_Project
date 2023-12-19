<?php 
include "connection.php";
session_start();
$pnid = $_SESSION["P_NID"];
$feed = $_POST["comment"];
$sql = "INSERT INTO `feedback` (`Feedback_ID`, `Message`,`P_NID`) 
VALUES (NULL, '$feed','$pnid')";
$result = mysqli_query($conn,$sql);
header("Location: user.php");
?>
