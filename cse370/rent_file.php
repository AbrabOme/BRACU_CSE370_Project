<?php
  include 'connection.php';

  if(isset($_POST['Find'])){
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $date = $_POST['date'];
    $q = "SELECT R.Route_no, R.Date, R.Departure, R.Destination, R.Time, V.Vehicle_no, V.Total_Seat,V.cost
          FROM route R
          JOIN travel T ON R.Route_no = T.Route_no
          JOIN renting_vehicle V ON T.Vehicle_no = V.Vehicle_no
          WHERE R.Departure = '$departure' AND R.Destination = '$destination' AND R.Date = '$date'";
    $route_result = mysqli_query($conn, $q);
  }
?>