<?php 

    //connection to database
    include __DIR__ . '/../../src/db.php';


    session_start();
    if (isset($_POST['signIn'])) {

        // getting infromation from login page
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // finding information in database
        $stmt = $conn->prepare("SELECT * FROM teachers WHERE email = ?");

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
                
                session_regenerate_id(true);
                $_SESSION['teacher_logged_in'] = true;
                
                // startes login session
                if (session_status() === PHP_SESSION_NONE) {
                    
                }
                
                // moves to next page
                $_SESSION['email'] = $row['email'];
                header("Location: ../admin_dashboard.php");
                exit();
                
            // gives and error
            } else {
                echo "Not Found, Incorrect Email or Password";
                header("Location: ../teacher_login_page.php?error=invalid_credentials");
                exit();
            }
        } else {
            echo "Not Found, Incorrect Email or Password";
            header("Location: ../teacher_login_page.php?error=invalid_credentials");
            exit();
        }
        
        $stmt->close();
    }
?>
