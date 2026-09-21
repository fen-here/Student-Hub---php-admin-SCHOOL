
<?php

    //connection to the database
    session_start();
    include '../src/db.php';
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher-Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    <!-- header of website -->
    <header class="container-header">
        <div class="title">
            <h1>Student Hub</h1>
            <p>High School</p>
        </div>
        <nav>
            <a href="#" class="btn" id="teacher_btn">Teachers Table</a>
            <a href="#" class="btn" id="student_btn">Students Table</a>
            <a href="#" class="btn" id="global_posts_btn">Global Posts</a>
            <a href="src/logout.php" class="btn logout" id="logout">log-out</a>
        </nav>
    </header>
    <!-- // main content  -->
    <section class="container-list">
        <div class="profile">
            <div class="person">
                <div class="pfp"></div>
                <h1 class="fname"><?php echo $TfirstName?></h1>
                <h1 class="lname"><?php echo $TlastName?></h1>
            </div>
            <div class="divide"></div>
            <div class="person">
                <p class="grade">Grade: <?php echo $Tgrade?></p>
                <p class="age"> Age: <?php echo $Tage?></p>
            </div>
        </div>
        <!-- //global posts -->
        <div class="global_posts" id="global-posts" style="display: none;">
            <div class="create_post" id="create_post">
                <form method="post" name="post_form" action="src/create_post.php" onsubmit="return Global_posts_valid()">
                    <i>Post Details</i>
                    <div class="input-group">
                        <input type="text" pattern="[A-Za-z\s]+" name="fname" id="fname" placeholder="First Name" value="<?php echo htmlspecialchars($firstName)?>" readonly>
                        <label for="fname">First Name</label>
                        <input type="text" pattern="[A-Za-z\s]+" name="lname" id="lName" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName)?>" readonly>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <input type="number" oninput="numbersOnly(this)" min="1" max="12" name="grade" id="grade" placeholder="Grade" required>
                        <label for="grade">Grade</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <input type="text" name="message" id="message" placeholder="Message" required>
                        <label for="message">Message</label>
                    </div>
                    <input type="submit" class="btn" value="Post" name="post">
                </form>
            </div>
            <!-- //data in table -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Frist Name</th>
                    <th>Last Name</th>
                    <th>Time</th>
                    <th>Grade</th>
                    <th>Message</th>
                    <th>reacts</th>
                </tr>
                <?php
                    if ($result_messages && mysqli_num_rows($result_messages) > 0){
                        while ($row = mysqli_fetch_assoc($result_messages)) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['reacts']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                ?>
            </table>
        </div>

        <!-- //student data table -->
        <div class="student-table" id="student-table">
            <h1 class="category">Students</h1>
            <div class="actions">
                <nav>
                    <a href="#" id="add_student_btn" class="btn">Add Student</a>
                    <a href="#" id="edit_student_btn" class="btn">Edit Student</a>
                    <a href="#" id="delete_student_btn" class="btn">Delete Student</a>
                </nav>
            </div>
            <div class="add_student" id="add_student" style="display: none;">
                <i>Add Student</i>
                <form method="post" onsubmit="return Add_student_valid()" action="src/add_student.php">
                    <i>Student Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="fName" id="fname" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="lName" id="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="number" oninput="numbersOnly(this)" min="4" max="20" name="age" id="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="number" oninput="numbersOnly(this)" min="1" max="12" name="grade" id="grade" placeholder="Grade" required>
                            <label for="grade">Grade</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <input type="text" name="email" id="email" placeholder="Email" required>
                            <label for="email">Email</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <label for="password">pasword</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register_student">
                </form>
            </div>
            <div class="edit_student" id="edit_student" style="display: none;" onsubmit="return Edit_student_valid()">
                <i>Edit Student</i>
                <form method="post" action="src/edit_student.php">
                    <i>Current Student details</i>
                    <div class="input-group">
                        <input type="number" oninput="numbersOnly(this)" id="id" name="current_id" placeholder="Student ID">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="fname" name="current_fname" placeholder="Student First Name">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="lname" name="current_lname" placeholder="Student Last Name">
                        <input type="number" oninput="numbersOnly(this)" min="1" max="13" id="grade" name="current_grade" placeholder="Student Grade">
                    </div>
                    <i>New Student Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" oninput="lettersOnly(this)" pattern="[A-Za-z\s]+" name="new_fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" oninput="lettersOnly(this)" pattern="[A-Za-z\s]+" name="new_lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="number" oninput="numbersOnly(this)" min="4" name="new_age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="number" oninput="numbersOnly(this)" min="1" max="12" name="new_grade" placeholder="Grade" required>
                            <label for="grade">Grade</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <input type="text" name="new_email" placeholder="Email" required>
                            <label for="email">Email</label>
                            <input type="password" name="new_password" placeholder="Password">
                            <label for="password">pasword</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register">
                </form>
            </div>
            <div class="delete_student" id="delete_student" style="display: none;">
                <i>Delete Student</i>
                <form method="post" action="src/delete_student.php" onsubmit="return Delete_student_valid()">
                    <i>Current Student details</i>
                    <div class="input-group">
                        <input type="number" oninput="numbersOnly(this)" id="id" name="id" placeholder="Student ID">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="fname" name="fname" placeholder="Student First Name">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="lname" name="lname" placeholder="Student Last Name">
                        <input type="number" oninput="numbersOnly(this)" min="1" max="12" id="grade" name="grade" placeholder="Student Grade">
                    </div>
                    <br>
                    <input type="password" id="admin_password" name="password" placeholder="Admin Password">
                    <br>
                    <input type="submit" class="btn" value="Delete User" name="register">
                </form>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Frist Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    <th>Email</th>
                    <th>Hashed Password</th>
                </tr>
                <?php
                    if ($result_students && mysqli_num_rows($result_students) > 0){
                        while ($row = mysqli_fetch_assoc($result_students)) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                ?>
            </table>
        </div>

        <!-- //teacher data table -->
        <div class="teacher-table" id="teacher-table" style="display: none;">
            <h1 class="category">Teachers</h1>
            <div class="actions">
                <nav>
                    <a href="#" id="add_teacher_btn" class="btn">Add Teacher</a>
                    <a href="#" id="edit_teacher_btn" class="btn">Edit Teacher</a>
                    <a href="#" id="delete_teacher_btn" class="btn">Delete Teacher</a>
                </nav>
            </div>
            <div class="add_teacher" id="add_teacher" style="display: none;" onsubmit="Add_teacher_valid()">
                <i>Add Teacher</i>
                <form method="post" action="src/add_teacher.php">
                    <i>Teacher Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="number" oninput="numbersOnly(this)" min="20" name="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="number" name="Grade" oninput="numbersOnly(this)" min="1" max="12" placeholder="Grade" required>
                            <label for="grade">Grade</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <input type="text" name="email" placeholder="Email" required>
                            <label for="email">Email</label>
                            <input type="password" name="password" placeholder="Password" required>
                            <label for="password">pasword</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register">
                </form>
            </div>
            <div class="edit_teacher" id="edit_teacher" style="display: none;" >
                <i>Edit Teacher</i>
                <form method="post" action="src/edit_teacher.php" onsubmit="return Edit_teacher_valid()">
                    <i>Current Teacher details</i>
                    <div class="input-group">
                        <input type="nunber" oninput="numbersOnly(this)" id="id" name="id" placeholder="Teacher ID">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="fname" name="fname" placeholder="Teacher First Name">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)"id="lname" name="lname" placeholder="Teacher Last Name">
                        <input type="number" min="1" max="13" id="grade" name="grade" placeholder="Teacher Grade">
                    </div>
                    <i>New Teacher Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" name="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="number" min="4" oninput="numbersOnly(this)" name="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="number" oninput="numbersOnly(this)" min="1" max="12" name="Grade" placeholder="Grade" required>
                            <label for="grade">Grade</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <input type="text" name="email" placeholder="Email" required>
                            <label for="email">Email</label>
                            <input type="password" name="password" placeholder="Password">
                            <label for="password">pasword</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register">
                </form>
            </div>
            <div class="delete_teacher" id="delete_teacher" style="display: none;">
                <i>Delete Teacher</i>
                <form method="post" action="src/delete_teacher.php" onsubmit="return Delete_teacher_valid()">
                    <i>Current Teacher details</i>
                    <div class="input-group">
                        <input type="number" oninput="numbersOnly(this)" id="id" name="id" placeholder="Teacher ID">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="fname" name="fname" placeholder="Teacher First Name">
                        <input type="text" pattern="[A-Za-z\s]+" oninput="lettersOnly(this)" id="lname" name="lname" placeholder="Teacher Last Name">
                        <input type="number" min="1" max="12" id="grade" name="grade" placeholder="Teacher Grade">
                    </div>
                    <br>
                    <input type="password" id="admin_password" name="password" placeholder="Admin Password">
                    <br>
                    <input type="submit" class="btn" value="Delete User" name="register">
                </form>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Frist Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    <th>Email</th>
                    <th>Hashed Password</th>
                </tr>
                <?php
                    if ($result_teachers && mysqli_num_rows($result_teachers) > 0){
                        while ($row = mysqli_fetch_assoc($result_teachers)) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                ?>
            </table>
        </div>
    </section>
    <script type="module" src="src/main.js" defer></script>
</body>
</html>