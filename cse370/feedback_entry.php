<?php 
include "connection.php"

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="design.css">

</head>
<header><h1>Feedbacks</h1></header>
<body>
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

.login-form {
  max-width: 400px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
  text-align: center;
}

textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
	margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  /* width: 50%; */
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  background-color: rgba(1, 43, 84, 0.498);
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #555;
}
    </style>

	<div class="login-form">
		<h2>Customer Feedback</h2>
		<form action= "feedback_work.php" method="POST" id = "feedback">
			
	<textarea rows="6" cols="28" name="comment" placeholder="Message..."></textarea>

	<br>
	<br>
	<center>
	<button type = "submit" name = "Submit">Submit</button>
</center>
</form>
</body>
</html>