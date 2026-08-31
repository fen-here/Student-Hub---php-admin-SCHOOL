<?php 
session_start(); 
include __DIR__ . '/../../src/db.php';

if(isset($_SESSION['email'])){ 
    $email = $_SESSION['email']; 
    
    $email = mysqli_real_escape_string($conn, $email); 
    $user_data = mysqli_query($conn, "SELECT * FROM `students` WHERE email='$email'"); 

    while($row = mysqli_fetch_array($user_data)){ 
        $firstName = $row['firstName'];
        $lastName = $row['lastName'] ;
        $grade = $row['grade'];
        $age = $row['age'];
        $id = $row['id'];
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
        <div class="title">
            <h1>Student Hub</h1>
            <p>High School</p>
        </div>

        <nav>
            <a href="../src/logout.php" class="btn" id="logout">log-out</a>
        </nav>
        
    </header>
    <div class="container-lg">
        <div class="profile">
            <div class="person">
                <div class="pfp"></div>
                <h1 class="fname"><?php  echo $firstName?></h1>
                <h1 class="lname"><?php  echo $lastName?></h1>
            </div>
            <div class="person">
                <p class="grade">Grade: <?php echo $grade?></p>
                <p class="age"> Age: <?php echo $age?></p>
                <p class="student-id"> ID: <?php echo $id?></p>
            </div>
        </div>
        <div class="global_posts">
            <h1>Posts</h1>
            <?php 
                if ($result_messages && mysqli_num_rows($result_messages) > 0){
                    while ($row = mysqli_fetch_assoc($result_messages)) {
                        echo "<div class='post'>";
                            echo "<div>";
                                echo "<div class='person'>";
                                    echo "<h1>" . htmlspecialchars($row['firstName']) . "</h1>";
                                    echo "<h1>" . htmlspecialchars($row['lastName']) . "</h1>";
                                echo "</div>";
                                echo "<div class='divide'></div>";
                                echo "<div class='person'>";
                                    echo "<p>" . 'Date: '. htmlspecialchars($row['date']) . "</p>";
                                    echo "<p>" . 'Grade: '. htmlspecialchars($row['grade']) . "</p>";
                                echo "</div>";
                            echo "</div>";
                            echo "<p class='message'>" . htmlspecialchars($row['message']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<h1>" . "No posts" . "</h1>";
                }
            ?>
        </div>
    </div>
    <?php
        if ($result_messages && mysqli_num_rows($result_messages) > 0){
            while ($row = mysqli_fetch_assoc($result_messages)) {
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
    ?>
</body>
</html>