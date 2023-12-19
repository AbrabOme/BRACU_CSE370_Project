<?php
  include 'connection.php';

  if(isset($_POST['submit'])){
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $date = $_POST['date'];
    $q = "SELECT R.Route_no, R.Date, R.Departure, R.Destination, R.Time, R.Fare,R.Sold_seat, V.Vehicle_no, V.Total_Seat
          FROM route R
          JOIN travel_through T ON R.Route_no = T.Route_no
          JOIN vehicle V ON T.Vehicle_no = V.Vehicle_no
          WHERE R.Departure = '$departure' AND R.Destination = '$destination' AND R.Date = '$date'";
    $route_result = mysqli_query($conn, $q);
  }
?>