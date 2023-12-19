<?php 
    include "connection.php";
    session_start();
    $route = $_POST["route"];
    $fare = $_POST["Fare"];
    $Quantity = $_POST["Quantity"];
    $paymentMethod = $_POST["paymentMethod"];
    $pnid = $_SESSION["P_NID"];    
    $total = $fare * $Quantity;

     $sql = "INSERT INTO `ticket` (`Ticket_no`, `Total_Amount`, `Payment_method`, `P_NID`, `Route_no`) 
     VALUES ('', '$total', '$paymentMethod', '$pnid', '$route')";

     $result = mysqli_query($conn,$sql);
     $resu = "UPDATE route SET Sold_seat = Sold_seat + '$Quantity' WHERE Route_no = '$route'";
     $ans= mysqli_query($conn,$resu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    h1, h2 {
      text-align: center;
    }

    button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color: #BF9000;
      color: rgba(6, 115, 223, 0.498);
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #7F6000;
    }

    center {
      display: block;
      text-align: center;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>End of Purchasing</title>
</head>
<body>
  <center><h1> Thank You For Purchasing </h1></center>
  <?php

    echo "<center><h2>Total amount: $total</h2></center>";
  
  ?>
  <button><a href='feedback_entry.php'> GIVE US YOUR FEEDBACK</button>
  <button><a href='user.php'> Back</button>
</html>