<?php
// Database configuration
 $db_host = 'localhost';
 $db_user = 'root'; // Replace with your database username
 $db_pass = ''; // Replace with your database password
 $db_name = 'phfoodlog_db'; // Replace with your database name

// Create connection
 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>