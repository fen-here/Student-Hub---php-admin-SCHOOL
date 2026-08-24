<?php
    // logs user out
    session_destroy();
    header("location: ../login.php");
?>