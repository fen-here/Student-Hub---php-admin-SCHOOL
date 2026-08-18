<?php

require __DIR__ . '/../../src/db.php';

$id= $_POST['id'];
$newFirstName = $_POST['fname'];
$newLastName = $_POST['lname'];
$newGrade = $_POST['grade'];
$stmt = $conn->prepare(
    "DELETE FROM teachers WHERE id=?"
);

$stmt->bind_param(
    "i", $id
);

$stmt->execute();

echo "Teacher information deleted successfully.";
header("location: ../admin_dashboard.php");


?>