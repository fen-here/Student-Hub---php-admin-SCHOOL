<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    // getting infromation
    $id= $_POST['id'];
    $newFirstName = $_POST['fname'];
    $newLastName = $_POST['lname'];
    $newGrade = $_POST['grade'];

    //database to delete teacher based on ID
    $stmt = $conn->prepare(
        "DELETE FROM teachers WHERE id=?"
    );

    // implementing teacher ID request into command
    $stmt->bind_param(
        "i", $id
    );

    //execution
    $stmt->execute();

    echo "Teacher information deleted successfully.";
    echo "Deleted!";
    header("location: ../admin_dashboard.php");


?>