<?php
// Hardcoded demo credentials
$valid_username = "admin";
$valid_password = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
		header("location:index.php");
		exit();
    } else {
        echo "<h2>Invalid Username or Password</h2>";
        echo "<p><a href='../home/login.html'>Try again</a></p>";
    }
}
?>
