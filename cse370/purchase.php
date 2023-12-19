<?php
  include "connection.php";
  $route = $_POST["rou"];
  $fare = $_POST["Fare"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Page</title>
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: rgba(68, 148, 172, 0.498);
    }

    header {
      background-color: rgba(2, 22, 42, 0.498);
      color: black;
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

    input[type="number"],
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
      background-color: rgba(2, 22, 42, 0.498);
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #555;
    }
    </style>
  <header>
    <header><h1>Purchase</h1>
  </header>
  <main>
    <form id="purchaseForm" method="post" action="end.php">
      <input type = "hidden" name = "Fare" value = <?php echo $fare; ?>>
      <input type = "hidden" name = "route" value = <?php echo $route; ?>>
      <div>
        <label for="Quantity">Quantity:</label>
        <input type="number" id="Quantity" name="Quantity" min="1" max="5">
      </div>
      <div>
        <p>Fare of each seat: <?php echo $fare; ?></p>
      </div>
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
