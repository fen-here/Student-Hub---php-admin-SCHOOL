<?php
require __DIR__ . '/../../src/admin_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['fName'] ?? null;
    $lastName  = $_POST['lName'] ?? null;
    $email     = $_POST['email'] ?? null;
    $password  = $_POST['password'] ?? null;

    if (empty($firstName)) { die("Error: First Name is missing or empty."); }
    if (empty($lastName))  { die("Error: Last Name is missing or empty."); }
    if (empty($email))     { die("Error: Email is missing or empty."); }
    if (empty($password))  { die("Error: Password is missing or empty."); }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Prepared statement expects exactly 4 placeholders
    $stmt = $conn->prepare("INSERT INTO auth_users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
    
    // Fixed: Crucial change from "ssisss" to "ssss" to match our 4 string parameters
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $passwordHash);
    
    if ($stmt->execute()) {
        // Safe redirect to dashboard without text-output buffer blocks
        header("Location: ../admin_dashboard.php");
        exit(); 
    } else {
        echo "Error execution failed: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
