<?php

    //connection to Database
    require __DIR__ . '/../../src/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // getting information from webpage
        $id        = $_POST['id'] ?? null;
        $firstName = $_POST['fName'] ?? null;
        $lastName  = $_POST['lName'] ?? null;
        $age       = $_POST['age'] ?? null;
        $grade     = $_POST['Grade'] ?? null;
        $email     = $_POST['email'] ?? null;
        $password  = $_POST['password'] ?? null;

        // checking Id exists andif necessary data is present
        if (empty($id)) { 
            echo "<script>
                    alert('Error: ID is missing.');
                    window.history.back();
                </script>";
            exit();
        }
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
            echo "<script>
                    alert('Success!');
                    window.history.back();
                </script>";
            header("Location: ../admin_dashboard.php");
            exit();
        } else {
            echo "<script>
                    alert('Fail!');
                    window.history.back();
                </script>";
            echo "Error execution failed: " . $stmt->error;
            exit();
        }

        $stmt->close();
    }
?>
