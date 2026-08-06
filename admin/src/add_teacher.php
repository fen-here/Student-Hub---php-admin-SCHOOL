<?php
require __DIR__ . '/../../src/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['fName'] ?? null;
    $lastName  = $_POST['lName'] ?? null;
    $age       = $_POST['age'] ?? null;
    // Accept both lowercase 'grade' and uppercase 'Grade' to prevent browser caching errors
    $grade     = $_POST['grade'] ?? $_POST['Grade'] ?? null;
    $email     = $_POST['email'] ?? null;
    $password  = $_POST['password'] ?? null;

    if (empty($firstName)) { die("Error: First Name is missing or empty."); }
    if (empty($lastName))  { die("Error: Last Name is missing or empty."); }
    if (empty($grade))     { die("Error: Grade is missing or empty."); }
    if (empty($email))     { die("Error: Email is missing or empty."); }
    if (empty($password))  { die("Error: Password is missing or empty."); }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO teachers (firstName, lastName, age, grade, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $firstName, $lastName, $age, $grade, $email, $passwordHash);
    
    if ($stmt->execute()) {
        echo "New student added successfully.";
        header("location: ../admin_dashboard.php");
    } else {
        echo "Error execution failed: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
