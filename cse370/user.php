<?php 
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GreenRoute Transport</title>

</head>
<body>
  <style>body {
  margin: 10px;
  padding: 10px;

}
body {
  font-family: Arial, sans-serif;
  background-color: rgba(58, 102, 141, 0.498);

}

header {
  background-color: #123d5f;
  color: rgb(244, 244, 244);
  text-align: center;
  padding: 20px 0;
}

main {
  max-width: 600px;
  margin: 20px auto;
  padding: 0 20px;
}

.form-group {
  margin-bottom: 15px;

}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"] {
  width: 100%;
  padding: 8px;
  font-size: 16px;
}

button {
  padding: 10px 20px;
  background-color: #164b73;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #001e35;
}

.zombie-express {
  margin-top: 40px;
  border-top: 1px solid #ccc;
  padding-top: 20px;
  color:  #164b73;
}

.zombie-express h2 {
  margin-bottom: 10px;
  
}</style>
  <header>
    <h1>GreenRoute Transport</h1>
  </header>

  <main>
    <section class="zombie-express">
      <h2>TICKET PURCHASE</h2>
      <form method="post" action="purchase_option.php">
        <div class="form-group">
          <label>Departure:</label>
          <input type="text" placeholder="Enter your departure" name="departure">
        </div>
        <div class="form-group">
          <label>Destination:</label>
          <input type="text" placeholder="Enter your destination" name="destination">
        </div>
        <div class="form-group">
          <label>Date:</label>
          <input type="date" placeholder="Enter your travel date" name="date">
        </div>
        <a href ="ticket_file.php"><button type="submit" name="submit">Search</button></a>
      </form>

      <br><br>

      <h2>VEHICLE RENT</h2>
      <form method="post" action="rent_option.php">
        <div class="form-group">
          <label>Departure:</label>
          <input type="text" placeholder="Enter your departure" name="departure">
        </div>
        <div class="form-group">
          <label>Destination:</label>
          <input type="text" placeholder="Enter your destination" name="destination">
        </div>
        <div class="form-group">
          <label>Date:</label>
          <input type="date" placeholder="Enter your travel date" name="date">
        </div>
        <a href ="rent_file.php"><button type="submit" name="Find">FIND</button></a>
      </form>



      <?php
      if(isset($_POST['submit'])){
        if ($route_result) {
          while ($row = mysqli_fetch_assoc($route_result)) {
      ?>
            <div class="zombie-express">

              <div><?php echo ($row["Total_Seat"] - $row["Sold_seat"]);?></div>
              <div>
                <form action="purchase_option.php" method="GET">
                  <button type="submit" name="Search">Search</button>
                </form>
              </div>
            </div>
      <?php
          }
        } else {
          echo "Error in query: " . mysqli_error($conn);
        }
      }
      ?> 





<!-- renting vehicle php part -->

<?php
      if(isset($_POST['Find'])){
        if ($route_result) {
          while ($row = mysqli_fetch_assoc($route_result)) {
      ?>
            <div class="zombie-express">
              <div>
                <form action="rent_option.php" method="GET">
                  <button type="submit" name="Find">Find</button>
                </form>
              </div>
            </div>
      <?php
          }
        } else {
          echo "Error in query: " . mysqli_error($conn);
        }
      }
      ?> 





    </section>
  </main>
  <a href = "logout.php"><button>LOG OUT</button></a>
</body>
</html>
