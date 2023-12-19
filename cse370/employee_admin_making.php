
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Form styles */
.form {
    width: 300px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form h3 {
    text-align: center;
    margin-bottom: 20px;
    color: black
}

.form input[type="text"],
.form input[type="password"],
.form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.form input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form input[type="submit"]:hover {
    background-color: #45a049;
}

/* Section styles */
section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
</style>
<?php 
$E_NID= $_POST["admin_employee_no"];
?><section>
   <div class="form">
    <form action="admin_making_work.php" method="post">
        <h3>Provide Username and Password</h3>
       
        <input type="text" name="user" required placeholder="enter your User ID">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="Enter" class="form-btn">
        <input type = "hidden" name= "admin" value=<?php echo $E_NID;?>>
    </form>
   </div>
   </section>
</body>
</html>