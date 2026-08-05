<?php

require"db.php";

$id=1;
$newFirstName = $_POST['firstName'];
$newLastName = $_POST['lastName'];
$newGrade = $_POST['grade'];
$stmt = $conn->prepare(
    "UPDATE teachers SET firstName=?, lastName=?, grade=? WHERE id=?"
);

$stmt->bind_param(
    "sssi", $newFirstName, $newLastName, $newGrade, $id    
);

$stmt->execute();

echo "Teacher information updated successfully.";

?>