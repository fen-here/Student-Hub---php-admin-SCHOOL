<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "admin";

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $db);

// 2. Check connection IMMEDIATELY before running queries
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Run your queries safely
$query_admins = "SELECT id, firstName, lastName, email, password FROM auth_users";
$result_admins = mysqli_query($conn, $query_admins);

?>
