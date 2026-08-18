<?php 

include __DIR__ . '/../../src/db.php';

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    // 1. Safe lookup using a Prepared Statement to prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // 2. Use password_verify to check the plain password against the stored database hash
        if (password_verify($password, $row['password'])) {
            
            // 3. Start the session BEFORE outputting any headers
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['email'] = $row['email'];
            header("Location: ../dashboard.php");
            exit();
            
        } else {
            echo "Not Found, Incorrect Email or Password";
        }
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
    
    $stmt->close();
}
?>
