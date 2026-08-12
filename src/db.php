<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "users";

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $db);

// 2. Check connection IMMEDIATELY before running queries
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Run your queries safely
$query_students  = "SELECT id, firstName, lastName, age, grade, email, password FROM students";
$query_teachers  = "SELECT id, firstName, lastName, age, grade, email, password FROM teachers";
$query_messages  = "SELECT id, firstName, lastName, date, grade, message FROM posts";
$result_students = mysqli_query($conn, $query_students);
$result_teachers = mysqli_query($conn, $query_teachers);
$result_messages = mysqli_query($conn, $query_messages);

?>
