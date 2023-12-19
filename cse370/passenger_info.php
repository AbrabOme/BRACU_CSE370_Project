<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $nid = mysqli_real_escape_string($conn,$_POST['nid']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);

  $select = " SELECT * FROM passenger WHERE NID = '$nid'";

  $result = mysqli_query($conn,$select);

  if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist';
   }
    else{
        $insert = "INSERT INTO passenger(NID,Name,Email,Phone_no,Address) VALUES('$nid','$name','$email','$phone','$address')";
        mysqli_query($conn, $insert);
        header('location: signup.php');
    }
  }

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="passenger.css">
    <!-- <style>
        body{
            background-color: rgb(255, 255, 255);
            margin: 0px;
        }
    </style> -->
</head>
<body>

<section>
    <div class="imgBox">
      <img src= "blur.jpg">
    </div>
    <div class="content_box">
  
    <div class="form_bx">
    <form action="passenger_info.php" method="post">
        <h3>Passenger Information</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <div class="input_bx">
        <input type="text" name="nid" required placeholder="enter your NID number">
        <input type="text" name="name" required placeholder="enter your name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="text" name="phone" required placeholder="enter your Phone number">
        <input type="text" name="address" required placeholder="enter your address">
        <input type="submit" name="submit" value="sign up" class="form-btn">
        <p>Already have an account? <a href="login.php">login now</a></p>
    </form>
   </div>

</section>
</body>
</html>