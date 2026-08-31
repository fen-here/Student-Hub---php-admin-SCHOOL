<?php
    // logs user out
    session_destroy();
    header("location: ../student/login.php");
?>