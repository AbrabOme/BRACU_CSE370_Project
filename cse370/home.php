<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Website</title>
  <style>
     header {
      margin-left: 70%;
      text-align: right;
      position: fixed;
      top: 0;
    }

    nav {
    position: fixed;
      display: flex;
      justify-content: space-between;
      align-items: center;
      top: 20px; 
    }

    nav div {
      display: flex;
      align-items: center;
     
    }

    nav div a {
      color: black;
      margin-left:80px;
      text-decoration: none;
      padding: 10px 20px;
      margin: 0 10px;
    }
    
    nav div dropdown-content{
        margin-right:70%;
    }
    .dropdown-container {
      position: relative;
    }

    .dropdown-container label {
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      background-color: #f1f1f1;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dropdown-content a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
    }

    .dropdown-container:hover .dropdown-content {
      display: block;
    }

    main {
      margin-top: 80px; /* Adjust based on the combined height of header and nav */
      text-align: center;
    }

    img {
      position: fixed;
      width: 100%;
      height: 100%;
      object-fit: cover; 
      top: 0;
      left: 0;
      z-index: -1; 
    }
  </style>
</head>
<body>

  <header>
    <h1>GreenRoute Transport</h1>
  </header>

  <nav>
    <div>
      <a href="home.php">Home</a>
      <a href="passenger_info.php">SignUp</a>
    </div>
    <div class="dropdown-container">
      <label for="dropdown">Select Role</label>
      <div class="dropdown-content">
        <a href="login.php">User</a>
        <a href="admin_login.php">Admin</a>
      </div>
    </div>
  </nav>

  <main>
    <img src="BUS.jpg" alt="">
  </main>

</body>
</html>
