<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    // getting necessary information
    $id= $_POST['id'];
    $newFirstName = $_POST['fName'];
    $newLastName = $_POST['lName'];
    $newGrade = $_POST['grade'];

    //database to delete student based on ID
    $stmt = $conn->prepare(
        "DELETE FROM students WHERE id=?"
    );

    // implementing student ID request into command
    $stmt->bind_param(
        "i", $id
    );
    
    //execution
    $stmt->execute();

    echo "<script>
            alert('Deleted');
            window.history.back();
        </script>";
    header("location: ../admin_dashboard.php");
    exit();


?>