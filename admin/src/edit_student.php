<?php
require __DIR__ . '/../../src/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture values from your HTML form inputs (matching standard naming conventions)
    $id        = $_POST['id'] ?? null;
    $firstName = $_POST['fName'] ?? null;
    $lastName  = $_POST['lName'] ?? null;
    $age       = $_POST['age'] ?? null;
    $grade     = $_POST['Grade'] ?? null; // Capitalised to match your HTML form context
    $email     = $_POST['email'] ?? null;
    $password  = $_POST['password'] ?? null;

    // Safety checks
    if (empty($id)) { 
        die("Error: Student ID is missing."); 
    }
    if (empty($firstName) || empty($lastName) || empty($email) || empty($age) || empty($grade)) { 
        die("Error: Required fields (First Name, Last Name, Email, Age, Grade) cannot be empty."); 
    }

    // Check if a new password was provided to decide whether to update it
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $stmt = $conn->prepare("UPDATE students SET firstName = ?, lastName = ?, age = ?, grade = ?, email = ?, password = ? WHERE id = ?");
        // 6 strings, 1 integer (s = string, i = integer)
        $stmt->bind_param("ssssssi", $firstName, $lastName, $age, $grade, $email, $passwordHash, $id);
    } else {
        // Update records without touching the existing password if left blank
        $stmt = $conn->prepare("UPDATE students SET firstName = ?, lastName = ?, age = ?, grade = ?, email = ? WHERE id = ?");
        // 5 strings, 1 integer
        $stmt->bind_param("sssssi", $firstName, $lastName, $age, $grade, $email, $id);
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
