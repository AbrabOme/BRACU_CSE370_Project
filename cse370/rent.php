<?php
  include "connection.php";
  $route = $_POST["rou"];
  $cost = $_POST["Fare"];
  $vehi = $_POST["veh"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: rgba(68, 148, 172, 0.498);
    }

    header {
      background-color: rgba(1, 43, 84, 0.498);
      color: white;
      text-align: center;
      padding: 10px 0;
    }

    main {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
      display: flex;
      flex-direction: column;
    }

    div {
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
    }

    select {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color:rgba(1, 43, 84, 0.498);
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #555;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Renting Page</title>
</head>
<body>
  <header>
    <h1>Rent</h1>
  </header>
  <main>
    <form id="purchaseForm" method="post" action="end_rent.php">
    <input type = "hidden" name = "cost" value = <?php echo $cost; ?>>
      <input type = "hidden" name = "route" value = <?php echo $route; ?>>
      <input type = "hidden" name = "vehicle" value = <?php echo $vehi; ?>>
      <div>
        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="">Select Payment Method</option>
          <option value="Credit Card">Credit Card</option>
          <option value="bKash">bkash</option>
          <option value="Cash">Cash</option>  
        </select>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>

  </main>
</body>
</html>
