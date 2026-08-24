<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information from webpage
        $id        = $_POST['id'] ?? null;
        $firstName = $_POST['fName'] ?? null;
        $lastName  = $_POST['lName'] ?? null;
        $age       = $_POST['age'] ?? null;
        $grade     = $_POST['Grade'] ?? null; // Capitalised to match your HTML form context
        $email     = $_POST['email'] ?? null;
        $password  = $_POST['password'] ?? null;

        // checking Id exists andif necessary data is present
        if (empty($id)) { 
            die("Error: Student ID is missing."); 
        }
        if (empty($firstName) || empty($lastName) || empty($email) || empty($age) || empty($grade)) { 
            die("Error: Required fields (First Name, Last Name, Email, Age, Grade) cannot be empty."); 
        }

        // checks if a new password is present and to create passwordhas
        if (!empty($password)) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            
            //updates the database
            $stmt = $conn->prepare("UPDATE students SET firstName = ?, lastName = ?, age = ?, grade = ?, email = ?, password = ? WHERE id = ?");

            //replaces place holders with the new information
            $stmt->bind_param("ssssssi", $firstName, $lastName, $age, $grade, $email, $passwordHash, $id);
        } else {
            //updates the database
            $stmt = $conn->prepare("UPDATE students SET firstName = ?, lastName = ?, age = ?, grade = ?, email = ? WHERE id = ?");
            
            //replaces place holders with the new information
            $stmt->bind_param("sssssi", $firstName, $lastName, $age, $grade, $email, $id);
        }

        //execution
        if ($stmt->execute()) {
            header("Location: ../admin_dashboard.php");
            exit();
        } else {
            echo "Error execution failed: " . $stmt->error;
        }

        $stmt->close();
    }
?>
