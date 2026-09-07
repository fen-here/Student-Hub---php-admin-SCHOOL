<?php

    //connection to database
    require __DIR__ . '/../../src/db.php'; 

    // Data collection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information fromwebpage
        $firstName = $_POST['fname'] ?? null; 
        $lastName = $_POST['lname'] ?? null; 
        $date = date('Y-m-d') ?? null; 
        $grade = $_POST['grade'] ?? $_POST['Grade'] ?? null; 
        $message = $_POST['message'] ?? null; 

        //checking if data is present
        if (empty($firstName)) { die("Error: First Name is missing or empty."); } 
        if (empty($lastName)) { die("Error: Last Name is missing or empty."); } 
        if (empty($grade)) { die("Error: Grade is missing or empty."); } 
        if (empty($message)) { die("Error: Message is missing or empty."); } 

        // inserting data into database
        $stmt = $conn->prepare("INSERT INTO posts (firstName, lastName, date, grade, message) VALUES (?, ?, ?, ?, ?)"); 
        $stmt->bind_param("sssss", $firstName, $lastName, $date, $grade, $message); 

        //execution
        if ($stmt->execute()) { 
            $stmt->close();
            echo "Success";
            header("Location: ../admin_dashboard.php"); 
            exit();
        } else { 
            echo "Fail";
            echo "Error execution failed: " . $stmt->error;
        } 
        
        $stmt->close(); 
    } 
?>
