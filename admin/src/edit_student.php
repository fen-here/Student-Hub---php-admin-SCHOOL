<?php

require"db.php";

$id=1;
$newFirstName = $_POST['firstName'];
$newLastName = $_POST['lastName'];
$newGrade = $_POST['grade'];
$stmt = $conn->prepare(
    "UPDATE students SET firstName=?, lastName=?, grade=? WHERE id=?"
);

$stmt->bind_param(
    "sssi", $newFirstName, $newLastName, $newGrade, $id    
);

$stmt->execute();

echo "Student information updated successfully.";

?>