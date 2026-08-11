
<?php
require '../src/db.php';
require '../src/admin_db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<link rel="stylesheet" href="../src/style.css">
<body>
    <header>
        <h1>Student Hub</h1>
        <nav>
            <a href="#" id="teacher_btn">Teachers Table</a>
            <a href="#" id="student_btn">Students Table</a>
            <a href="#" id="admin_btn">Admin Table</a>
            <a href="#" class="logout" id="logout">log-out</a>
        </nav>
    </header>
    <section>
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
                <form method="post" action="src/add_student.php">
                    <i>Student Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="fName" id="fname" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="text" name="age" id="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="text" name="grade" id="grade" placeholder="Grade" required>
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
            <div class="edit_student" id="edit_student" style="display: none;">
                <i>Edit Student</i>
                <form method="post" action="src/edit_student.php">
                    <i>Current Student details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="current_id" placeholder="Student ID">
                        <input type="text" id="fname" name="current_fname" placeholder="Student First Name">
                        <input type="text" id="lname" name="current_lname" placeholder="Student Last Name">
                        <input type="text" id="grade" name="current_grade" placeholder="Student Grade">
                    </div>
                    <i>New Student Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="new_fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="new_lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="text" name="new_age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="text" name="new_grade" placeholder="Grade" required>
                            <label for="grade">Grade</label>
                        </div>
                    </div>
                    <div class="input-group">
                            <input type="text" name="new_email" placeholder="Email" required>
                            <label for="email">Email</label>
                            <input type="password" name="new_password" placeholder="Password" required>
                            <label for="password">pasword</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register">
                </form>
            </div>
            <div class="delete_student" id="delete_student" style="display: none;">
                <i>Delete Student</i>
                <form method="post" action="src/delete_student.php">
                    <i>Current Student details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="id" placeholder="Student ID">
                        <input type="text" id="fname" name="fname" placeholder="Student First Name">
                        <input type="text" id="lname" name="lname" placeholder="Student Last Name">
                        <input type="text" id="grade" name="grade" placeholder="Student Grade">
                    </div>
                    <br>
                    <input type="password" id="admin_password" name="password" placeholder="Admin Password">
                    <br>
                    <input type="submit" class="btn" value="Delete User" name="register">
                </form>
            </div>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lastname</th>
                    <th>age</th>
                    <th>grade</th>
                    <th>email</th>
                    <th>password</th>
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
        <div class="teacher-table" id="teacher-table" style="display: none;">
            <h1 class="category">teachers</h1>
            <div class="actions">
                <nav>
                    <a href="#" id="add_teacher_btn" class="btn">Add Teacher</a>
                    <a href="#" id="edit_teacher_btn" class="btn">Edit Teacher</a>
                    <a href="#" id="delete_teacher_btn" class="btn">Delete Teacher</a>
                </nav>
            </div>
            <div class="add_teacher" id="add_teacher" style="display: none;">
                <i>Add Teacher</i>
                <form method="post" action="src/add_teacher.php">
                    <i>Teacher Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="text" name="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="text" name="Grade" placeholder="Grade" required>
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
            <div class="edit_teacher" id="edit_teacher" style="display: none;">
                <i>Edit Teacher</i>
                <form method="post" action="src/edit_teacher.php">
                    <i>Current Teacher details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="id" placeholder="Teacher ID">
                        <input type="text" id="fname" name="fname" placeholder="Teacher First Name">
                        <input type="text" id="lname" name="lname" placeholder="Teacher Last Name">
                        <input type="text" id="grade" name="grade" placeholder="Teacher Grade">
                    </div>
                    <i>New Teacher Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-time"></i>
                        <div>
                            <input type="text" name="age" placeholder="Age" required>
                            <label for="age">Age</label>
                            <input type="text" name="Grade" placeholder="Grade" required>
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
            <div class="delete_teacher" id="delete_teacher" style="display: none;">
                <i>Delete Teacher</i>
                <form method="post" action="src/delete_teacher.php">
                    <i>Current Teacher details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="id" placeholder="Teacher ID">
                        <input type="text" id="fname" name="fname" placeholder="Teacher First Name">
                        <input type="text" id="lname" name="lname" placeholder="Teacher Last Name">
                        <input type="text" id="grade" name="grade" placeholder="Teacher Grade">
                    </div>
                    <br>
                    <input type="password" id="admin_password" name="password" placeholder="Admin Password">
                    <br>
                    <input type="submit" class="btn" value="Delete User" name="register">
                </form>
            </div>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lastname</th>
                    <th>age</th>
                    <th>grade</th>
                    <th>email</th>
                    <th>password</th>
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
        <div class="admin-table" id="admin-table" style="display: none;">
            <h1 class="category">Admins</h1>
            <div class="actions">
                <nav>
                    <a href="#" id="add_admins_btn" class="btn">Add admin</a>
                    <a href="#" id="edit_admins_btn" class="btn">Edit admin</a>
                    <a href="#" id="delete_admin_btn" class="btn">Delete admin</a>
                </nav>
            </div>

            <!-- Add Admin Section -->
            <div class="add_admin" id="add_admin" style="display: none;">
                <i>Add Admin</i>
                <form method="post" action="src/add_admin.php">
                    <i>Admin Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="fName" id="fname" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                        <label for="lName">Last Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="email" id="email" placeholder="Email" required>
                        <label for="email">Email</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" class="btn" value="Register" name="register_admin">
                </form>
            </div>

            <!-- Edit Admin Section -->
            <div class="edit_admin" id="edit_admin" style="display: none;">
                <i>Edit Admin</i>
                <form method="post" action="src/edit_admin.php">
                    <i>Current Admin details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="id" placeholder="Admin ID">
                        <input type="text" id="fname" name="fname" placeholder="Admin First Name">
                        <input type="text" id="lname" name="lname" placeholder="Admin Last Name">
                    </div>
                    <i>New Admin Details</i>
                    <i class="fas fa-user"></i>
                    <div class="input-group">
                        <input type="text" name="fName" placeholder="First Name" required>
                        <label for="fname">First Name</label>
                        <input type="text" name="lName" placeholder="Last Name" required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="email" placeholder="Email" required>
                        <label for="email">Email</label>
                        <input type="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" class="btn" value="Update" name="update_admin">
                </form>
            </div>

            <!-- Delete Admin Section -->
            <div class="delete_admin" id="delete_admin" style="display: none;">
                <i>Delete Admin</i>
                <form method="post" action="src/delete_admin.php">
                    <i>Current details</i>
                    <div class="input-group">
                        <input type="text" id="id" name="id" placeholder="Admin ID">
                        <input type="text" id="fname" name="fname" placeholder="Admin First Name">
                        <input type="text" id="lname" name="lname" placeholder="Admin Last Name">
                    </div>
                    <br>
                    <input type="password" id="admin_password" name="password" placeholder="Admin Password">
                    <br>
                    <input type="submit" class="btn" value="Delete User" name="delete_admin">
                </form>
            </div>

            <!-- Admin Table View -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                <?php if ($result_admins && mysqli_num_rows($result_admins) > 0){
                    while ($row = mysqli_fetch_assoc($result_admins)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['firstName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['lastName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                } ?>
            </table>
        </div>
    </section>
    <script type="module" src="src/main.js"></script>
</body>
</html>