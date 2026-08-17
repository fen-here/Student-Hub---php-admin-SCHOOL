<?php 

include __DIR__ . '/../../src/db.php';

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
   
    $sql="SELECT * FROM teachers WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: ../admin_dashboard.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }

}
?>