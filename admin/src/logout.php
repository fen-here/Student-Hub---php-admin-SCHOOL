<?php
    echo "<script>
        alert('Logged Out Successfully!');
        window.history.back();
    </script>";
    // ends session
    session_destroy();
    header("location: ../Teacher_login_page.php");
?>