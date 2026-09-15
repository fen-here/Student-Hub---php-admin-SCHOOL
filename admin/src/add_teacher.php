<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    // Data collection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information from webpage
        $firstName = $_POST['fName'] ?? null;
        $lastName  = $_POST['lName'] ?? null;
        $age       = $_POST['age'] ?? null;
        $grade     = $_POST['grade'] ?? $_POST['Grade'] ?? null;
        $email     = $_POST['email'] ?? null;
        $password  = $_POST['password'] ?? null;

        //checking for if infromation is missing or empty
        if (empty($firstName)) { 
            echo "<script>
                    alert('Error: First Name is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }
        if (empty($lastName)) { 
            echo "<script>
                    alert('Error: Last Name is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }
        if (empty($grade)) { 
            echo "<script>
                    alert('Error: Grade is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }
        if (empty($email)) { 
            echo "<script>
                    alert('Error: Email is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }
        if (empty($password)) { 
            echo "<script>
                    alert('Error: Password is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }

        //checking is password already exists
        $checkEmail = $conn->prepare("SELECT email FROM teachers WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();
        
        if ($checkEmail->num_rows > 0) {
            $checkEmail->close();
            echo "<script>
                    alert('Error: This email address is already registered.');
                    window.history.back();
                </script>";
            exit();
        }
        $checkEmail->close();

        // hashing password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // inserting in student database
        $stmt = $conn->prepare("INSERT INTO teachers (firstName, lastName, age, grade, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $firstName, $lastName, $age, $grade, $email, $passwordHash);

        // execution
        if ($stmt->execute()) {
            echo "<script>
                    alert('New student added successfully.');
                    window.history.back();
                </script>";
            $_SESSION['success'] = "Success";
            header("location: ../admin_dashboard.php");
            exit();
        } else {
            echo "<script>
                    alert('New student added unsuccessfully.');
                    window.history.back();
                </script>";
            $_SESSION['success'] = "Fail";
            echo "Error execution failed: " . $stmt->error;

        }
        

        $stmt->close();
    }
?>
