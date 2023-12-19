<?php
include 'connection.php';
session_start();
if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = ($_POST['password']);
  $select = "SELECT * FROM passenger_login_info WHERE PUID = '$username'";
  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_assoc($result);
    $verify = password_verify($password,$row['Password']);
    if ($verify==1){
      $_SESSION["P_NID"] = $row["P_NID"];
      header('location:user.php');
    }else{
      $error[] = 'incorrect password';
    }

  }
  else{
       $error[] = 'incorrect username';
    }

  }
?> 

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--<link rel="stylesheet" href="style.css">-->
    
</head>
<body>
  <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
section .content_box .form_bx .error-msg{
    margin: 10px, 0;
    background: crimson;
    color: #fff;
    border-radius: 5px;
    font-size: 20px;
    margin-left: 16%;


}
section{
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
}

section .imgBox{
    position: relative;
    width: 50%;
    height: 100%;

}

section .imgBox:before{
    content: '';
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height:100%;
    
    mix-blend-mode: screen;

}
section .imgBox img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}



/*-- style form */
section .content_box{
    background: #1a2020;
    display: flex;
    width: 50%;
    height: 100%;
    justify-content: center;
    align-items: center;


}


section .content_box .form{
    background: #d88a8a;
    width: 50%;

}

section .content_box .form .h3{
    font-weight: 600;
    font-size: 1.5em;
    text-transform: uppercase;
    margin-bottom: 20px;
    display: inline-block;
    letter-spacing: 1px;
}

section .content_box .form_bx{
    margin-bottom: 20px;
    
}

section .content_box .form_bx .input_bx span{
    font-size: 16px;
    margin-bottom: 5px;
    display: inline-block;
    color: #607db8;
    font-weight: 300;
    font-size: 16px;
    letter-spacing: 1px;

}

section .content_box .form_bx .input_bx input{
    margin-top: 20px;
    margin-top:20px;
    margin-bottom: 20px;
    width: 100%;
    padding: 10px 20px;
    outline: none;
    font-weight: 400;
    font-size: 15 px;
    letter-spacing: 1px;
    color: #0c1931;
    background: #fff;
    border-radius: 200px;


}

section .content_box .form_bx .input_bx input[type="submit"]{
    background: #f3f3f3;
    color: #000000;
    outline: none;
    border: none;
    font-weight: 600;
    cursor: pointer;


}

section .content_box .form_bx .input_bx input[type="submit"]:hover{
    background: #36f5a2;
}

section .content_box .form_bx .input_bx p{
    color:#ffffff;
}
section .content_box .form_bx .input_bx p a{
    color: #ffffff;
}

@media (max-width: 768px){
    section .imgBox {
    position: absolute;
    /* position: relative; */
    width: 100%;
    height: 100%;
    left: 0;
    }
    section .content_box {
        display: flex;
        width: 100%;
        height: 100%;
        /* justify-content: center; */
        z-index: 1;
        /* CONTAIN-INTRINSIC-BLOCK-SIZE: AUTO 100PX; */
        justify-content: center;
        align-items: center;
    }
}


h3 {
    text-transform: uppercase;
    margin-top: 20px;
    color:#ffffff;
}
  </style>
  <section>
    <div class="imgBox">
      <img src="hill.jpg">
    </div>
    <div class="content_box">
  
    <div class="form_bx">
    <form action="login.php" method="post">
        <h3>Login</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <div class="input_bx">
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name='password' required placeholder="enter your password">
        <input type="submit" name="submit" value="login" class="form-btn">
        <p>Do not have an account yet? <a href="passenger_info.php">Signup now</a></p>
        </div>
    </form>
    </div>
   </div>
   </section>
</body>
</html>