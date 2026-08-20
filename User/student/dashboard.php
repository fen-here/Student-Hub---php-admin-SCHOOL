<?php 
session_start(); 
include __DIR__ . '/../../src/db.php';

if(isset($_SESSION['email'])){ 
    $email = $_SESSION['email']; 
    
    $email = mysqli_real_escape_string($conn, $email); 
    
    $query = mysqli_query($conn, "SELECT * FROM `students` WHERE email='$email'"); 
    
    while($row = mysqli_fetch_array($query)){ 
        $result = $row['firstName'].' '.$row['lastName']; 
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../src/style.css">
</head>
<body>
    <header class="container-header">

    </header>
    <div class="container-lg">
        <div class="profile">
            <h1>Hello <?php echo $result;?></h1>
        </div>
        <div class="global_posts">
            <div class="post">
                <div>
                    <div class="person">
                        <h1 class="fname">First Name</h1>
                        <h1 class="lname">Last Name</h1>
                    </div>
                    <div class="person">
                        <p class=timestamp>Date</p>
                        <p class="grade">Grade</p>
                    </div>
                </div>
                <p class="message">Message</p>
            </div>
        </div>
    </div>
    
</body>
</html>