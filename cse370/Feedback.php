<?php
include "connection.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="vehicle_dis.css">
</head>
<body>
<header>
    <h1>Feedbacks From Passengers</h1>
  </header>
<table style="border: 1px solid black; width: 100%">
    <thead><tbody>
    <tr class = "sami" >
        <th>Feedback No</th>
        <th>Feedback</th>

    </tr>
    <?php
    $sql = "SELECT * from `feedback`";
$result = mysqli_query($conn,$sql);
if($result){
        while($row = mysqli_fetch_assoc($result)){
            ?>
        
            <tr style="text-align: center;">
                <td> <?php echo $row['Feedback_ID'];?> </td> 
                <td> <?php echo $row['Message'];?> </td>
        </tr>
                <?php    
        }
        
}

?>
        
</table>
</tbody>
<button><a href='admin_page.php'> Back</button>
</body>
</html>