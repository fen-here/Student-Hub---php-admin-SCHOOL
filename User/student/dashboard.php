<?php 
session_start(); 
include __DIR__ . '/../../src/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Dashboard</title>
    <link rel="stylesheet" href="../../src/style.css">
</head>
<body>
    <header class="container-header">
        <div class="title">
            <h1>Student Hub</h1>
            <p>High School</p>
        </div>
        <nav>
            <a href="#" class="btn" id="dashboard_btn">Dashboard</a>
            <a href="#" class="btn" id="time_table_btn">Time Table</a>
            <a href="../src/logout.php" class="btn" id="logout">log-out</a>
        </nav>
        
    </header>
    <div class="container-lg">
        <div class="profile">
            <div class="person">
                <div class="pfp"></div>
                <h1 class="fname"><?php  echo $SfirstName?></h1>
                <h1 class="lname"><?php  echo $SlastName?></h1>
            </div>
            <div class="divide"></div>
            <div class="person">
                <p class="grade">Grade: <?php echo $Sgrade?></p>
                <p class="age"> Age: <?php echo $Sage?></p>
                <p class="student-id"> ID: <?php echo $Sid?></p>
            </div>
        </div>

        <div class="timetable" id="timetable" style="display:none;">
            <h1>Time Table</h1>
            <table class="timetable-element">
                <tr>
                    <th class="time">Time</th>
                    <th>Subject</th>
                </tr>
                <tr>
                    <td class="time">8:30-8:50</td>
                    <td>Homroom</td>
                </tr>
                <tr>
                    <td class="time">8:50-9:50</td>
                    <td>Subject 1</td>
                </tr>
                <tr>
                    <td class="time">9:50-10:50</td>
                    <td>Subject 2</td>
                </tr>
                <tr id="break">
                    <td class="break">10:50-11:20</td>
                    <td class="break">Recess</td>
                </tr>
                <tr>
                    <td class="time">11:20-12:20</td>
                    <td>Subject 2</td>
                </tr>
                <tr>
                    <td class="time">12:20-13:20</td>
                    <td>Subject 4</td>
                </tr>
                <tr>
                    <td class="break">13:20-13:50</td>
                    <td class="break">Lunch</td>
                </tr>
                <tr>
                    <td class="time">13:50-14:50</td>
                    <td>Subject 5</td>
                </tr>
            </table>
        </div>
        <!--Posts--> 
        <div class="global_posts" id="dashboard"> 
            <h1>Posts</h1> 
            <?php 
            if ($result_messages && mysqli_num_rows($result_messages) > 0) { 
                while ($row = mysqli_fetch_assoc($result_messages)) { 
                    echo "<div class='post'>"; 
                        echo "<div>"; 
                            echo "<div class='person'>"; 
                                echo "<div class='pfp'></div>"; 
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
                        
                        // FIXED: Wrapped the input/button in a form tag to send the POST request
                        echo "<form action='../src/reacts.php' method='POST' class='input-group'>"; 
                            // FIXED: Concatenated $row['id'] properly instead of nesting <?php tags
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>"; 
                            echo "<button type='submit' class='react' id='react' name='react'></button>"; 
                            echo "<p>" . htmlspecialchars($row['reacts']) . "</p>"; 
                        echo "</form>"; 
                    echo "</div>"; 
                } 
            } else { 
                echo "<h1>" . "No posts" . "</h1>"; 
            } 
            ?> 
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
    <script type="module" src="../src/dashboard.js"></script>
</body>
</html>