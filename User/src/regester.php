<?php 

    //connection to database
    include __DIR__ . '/../../src/db.php';

    if (isset($_POST['signIn'])) {

        // getting infromation from login page
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // finding information in database
        $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");

        // replacing place holders
        $stmt->bind_param("s", $email);

        // execution
        $stmt->execute();
        $result = $stmt->get_result();

        //checking login information
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            //verifiying password
            if (password_verify($password, $row['password'])) {
                
                // startes login session
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                // moves to next page
                $_SESSION['email'] = $row['email'];
                header("Location: ../admin_dashboard.php");
                exit();
                
            // gives and error
            } else {
                echo "Not Found, Incorrect Email or Password";
            }
        } else {
            echo "Not Found, Incorrect Email or Password";
        }
        
        $stmt->close();
    }
?>
