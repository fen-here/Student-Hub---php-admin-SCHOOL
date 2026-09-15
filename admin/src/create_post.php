<?php

    //connection to database
    require __DIR__ . '/../../src/db.php'; 

    // Data collection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information fromwebpage
        $firstName = $_POST['fname'] ?? null; 
        $lastName = $_POST['lname'] ?? null; 
        $date = date('Y-m-d') ?? null; 
        $grade = $_POST['grade'] ?? $_POST['Grade'] ?? null; 
        $message = $_POST['message'] ?? null; 

        //checking if data is present
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
        if (empty($message)) { 
            echo "<script>
                    alert('Error: Message is missing or empty.');
                    window.history.back();
                </script>";
            exit();
        }

        // inserting data into database
        $stmt = $conn->prepare("INSERT INTO posts (firstName, lastName, date, grade, message) VALUES (?, ?, ?, ?, ?)"); 
        $stmt->bind_param("sssss", $firstName, $lastName, $date, $grade, $message); 

        //execution
        if ($stmt->execute()) { 
            $stmt->close();
            echo "<script>
                    alert('Success');
                    window.history.back();
                </script>";
            header("Location: ../admin_dashboard.php"); 
            exit();
        } else { 
            echo "<script>
                    alert('Fail');
                    window.history.back();
                </script>";
            echo "Error execution failed: " . $stmt->error;
        } 
        
        $stmt->close(); 
    } 
?>
