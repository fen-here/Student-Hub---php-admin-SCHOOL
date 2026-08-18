<?php 
require __DIR__ . '/../../src/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $firstName = $_POST['fname'] ?? null; 
    $lastName = $_POST['lname'] ?? null; 
    $date = date('d-m-Y'); 
    $grade = $_POST['grade'] ?? $_POST['Grade'] ?? null; 
    $message = $_POST['message'] ?? null; 

    if (empty($firstName)) { die("Error: First Name is missing or empty."); } 
    if (empty($lastName)) { die("Error: Last Name is missing or empty."); } 
    if (empty($grade)) { die("Error: Grade is missing or empty."); } 
    if (empty($message)) { die("Error: Message is missing or empty."); } 

    // Adjusted bind_param from "ssisss" to "sssss" (or "ssiss" if grade is integer)
    $stmt = $conn->prepare("INSERT INTO posts (firstName, lastName, date, grade, message) VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssss", $firstName, $lastName, $date, $grade, $message); 

    if ($stmt->execute()) { 
        $stmt->close();
        header("Location: ../admin_dashboard.php"); 
        exit();
    } else { 
        echo "Error execution failed: " . $stmt->error; 
    } 
    
    $stmt->close(); 
} 
?>
