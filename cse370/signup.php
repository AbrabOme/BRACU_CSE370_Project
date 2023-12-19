<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = ($_POST['password']);
  $cpassword = ($_POST['cpassword']);
  $nid = mysqli_real_escape_string($conn,$_POST['nid']);

  $select = " SELECT * FROM passenger_login_info WHERE p_nid = '$nid'";
  $hash = password_hash($password,PASSWORD_DEFAULT);
  $result = mysqli_query($conn,$select);

  if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist';
  }
  else{
    if($password != $cpassword){
       $error[] = 'incorrect password';
    }
    else{
        $insert = "INSERT INTO passenger_login_info(PUID,password,P_NID) VALUES('$username','$hash','$nid')";
        mysqli_query($conn, $insert);
        header('location:login.php');
    }
  }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="signup.css">

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
    /*background: linear-gradient(225deg,#00520ccd,#03a9f4);*/
    z-index: 1;
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
    background: #0a280a;
    display: flex;
    width: 50%;
    height: 100%;
    justify-content: center;
    align-items: center;


}


section .content_box .form{
    background: #d88a8a;
    width: 20%;
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
    margin-bottom: 20px;
    margin-left: 120px;
    width:70%;
    padding: 10px 20px;
    outline: none;
    font-weight: 40;
    letter-spacing: 1px;
    color: #0c1931;
    background: #fff;
    border-radius: 200px;


}

section .content_box .form_bx .input_bx input[type="submit"]{
    background: #f3f3f3;
    color: black;
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
    margin-left: 120px;
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
    align-items:center;
    margin-left: 120px;
    text-transform: uppercase;
    margin-top: 20px;
    color: white;
    font-weight: 600;
    font-size: 1.5em;
    margin-bottom: 20px;
    letter-spacing: 1px;
}
</style>
  
<section>
    <div class="imgBox">
      <img src="mainlogin.jpg">
    </div>
    <div class="content_box">
  
    <div class="form_bx">
    <form action="" method="post">
        <h3>
          SignUp
        </h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        
        ?>
        <div class="input_bx">
        <input type="text" name="username" required placeholder="enter your username">
        <input type="text" name="nid" required placeholder="enter your nid">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="confirm your password">
        <input type="submit" name="submit" value="sign up" class="form-btn">
        <p>Already have an account? <a href="login.php">login now</a></p>
    </form>
   </div>
</body>
</setion>
</html>