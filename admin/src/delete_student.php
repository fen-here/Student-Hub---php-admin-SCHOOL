<?php

require __DIR__ . '/../../src/db.php';

$id=1;
$newFirstName = $_POST['firstName'];
$newLastName = $_POST['lastName'];
$newGrade = $_POST['grade'];
$stmt = $conn->prepare(
    "DELETE FROM students WHERE id=?"
);

$stmt->bind_param(
    "i", $id
);

$stmt->execute();

echo "Student information deleted successfully.";

?>