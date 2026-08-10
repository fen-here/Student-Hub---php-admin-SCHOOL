<?php
require __DIR__ . '/../../src/admin_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture the target Admin ID dynamically from your HTML form input (name="id")
    $id = $_POST['id'] ?? null;

    if (empty($id)) { 
        die("Error: Admin ID is missing."); 
    }

    // Prepared statement to safely delete the user by ID
    $stmt = $conn->prepare("DELETE FROM auth_users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Safe redirect to dashboard without text-output blocks
        header("Location: ../admin_dashboard.php");
        exit();
    } else {
        echo "Error execution failed: " . $stmt->error;
    }

    $stmt->close();
}
?>
