<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    //data collection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information from webpage
        $firstName = $_POST['fName'] ?? null;
        $lastName  = $_POST['lName'] ?? null;
        $age       = $_POST['age'] ?? null;
        $grade     = $_POST['grade'] ?? $_POST['Grade'] ?? null;
        $email     = $_POST['email'] ?? null;
        $password  = $_POST['password'] ?? null;
        
        //checking if data is present
        if (empty($firstName)) { die("Error: First Name is missing or empty."); }
        if (empty($lastName))  { die("Error: Last Name is missing or empty."); }
        if (empty($grade))     { die("Error: Grade is missing or empty."); }
        if (empty($email))     { die("Error: Email is missing or empty."); }
        if (empty($password))  { die("Error: Password is missing or empty."); }

        
        $checkEmail = $conn->prepare("SELECT email FROM teachers WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();
        
        if ($checkEmail->num_rows > 0) {
            $checkEmail->close();
            die("Error: This email address is already registered.");
        }
        $checkEmail->close();

        // hashing password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // inserting in teacher database
        $stmt = $conn->prepare("INSERT INTO teachers (firstName, lastName, age, grade, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $firstName, $lastName, $age, $grade, $email, $passwordHash);
        
        // execution
        if ($stmt->execute()) {
            $stmt->close();
            
            header("Location: ../admin_dashboard.php");
            exit(); 
        } else {
            echo "Error execution failed: " . $stmt->error;
            $stmt->close();
        }
    }
?>
