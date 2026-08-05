<?php

$servername="localhost";
$username="root";
$password="";
$db="users";



$conn = new mysqli($servername, $username, $password, $db);

$query_students = "SELECT id, firstName, lastName, age, grade, email, password FROM students";
$query_teachers = "SELECT id, firstName, lastName, age, grade, email, password FROM teachers";
$result_students = mysqli_query($conn, $query_students);
$result_teachers = mysqli_query($conn, $query_teachers);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection to DB successful.";

?>
