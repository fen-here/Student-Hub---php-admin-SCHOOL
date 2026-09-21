<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $db         = "users";
    // 1. Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // 2. Check connection IMMEDIATELY before running queries
    if ($conn->connect_error) {
        echo "<script>    
                alert('Error: Database Connection Failure');
                window.history.back();
            </script>";
    }

    // 3. Run your queries safely
    $query_students  = "SELECT id, firstName, lastName, age, grade, email, password FROM students";
    $query_teachers  = "SELECT id, firstName, lastName, age, grade, email, password FROM teachers";
    $query_messages  = "SELECT id, firstName, lastName, date, grade, message, reacts FROM posts";
    $result_students = mysqli_query($conn, $query_students);
    $result_teachers = mysqli_query($conn, $query_teachers);
    $result_messages = mysqli_query($conn, $query_messages);

    
    if(isset($_SESSION['email'])) {
        $email = $_SESSION["email"];

        $email = mysqli_real_escape_string($conn, $email);
        $user_data_teacher = mysqli_query($conn, "SELECT * FROM `teachers` WHERE email='$email'");
        
        while($row = mysqli_fetch_array($user_data_teacher)){ 
            $TfirstName = $row['firstName'];
            $TlastName = $row['lastName'] ;
            $Tgrade = $row['grade'];
            $Tage = $row['age'];
            $Tid = $row['id'];
        }


        $user_data_students = mysqli_query($conn, "SELECT * FROM `students` WHERE email='$email'");
        
        while($row = mysqli_fetch_array($user_data_students)){ 
            $SfirstName = $row['firstName'];
            $SlastName = $row['lastName'] ;
            $Sgrade = $row['grade'];
            $Sage = $row['age'];
            $Sid = $row['id'];
        }
    }    

?>
