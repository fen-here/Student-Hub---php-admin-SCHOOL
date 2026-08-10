<?php
require __DIR__ . '/../../src/admin_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Capture values from your HTML form inputs
    $id        = $_POST['id'] ?? null;
    $firstName = $_POST['fName'] ?? null;
    $lastName  = $_POST['lName'] ?? null;
    $email     = $_POST['email'] ?? null;
    $password  = $_POST['password'] ?? null;

    if (empty($id)) { 
        die("Error: Admin ID is missing."); 
    }
    if (empty($firstName) || empty($lastName) || empty($email)) { 
        die("Error: Required fields (First Name, Last Name, Email) cannot be empty."); 
    }

    // Check if a new password was provided to decide whether to update it
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("UPDATE auth_users SET firstName = ?, lastName = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $firstName, $lastName, $email, $passwordHash, $id);
    } else {
        // Update records without touching the existing password if the field was left blank
        $stmt = $conn->prepare("UPDATE auth_users SET firstName = ?, lastName = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssi", $firstName, $lastName, $email, $id);
    }

    if ($stmt->execute()) {
        header("Location: ../admin_dashboard.php");
        exit();
    } else {
        echo "Error execution failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
  