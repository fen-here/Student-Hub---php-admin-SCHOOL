<?php

require"db.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$grade = $_POST['grade'];
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO teachers (firstName, lastName, age, grade, email, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $firstName, $lastName, $age, $grade, $email, $password);
$stmt->execute();

echo "New teacher added successfully.";

?>