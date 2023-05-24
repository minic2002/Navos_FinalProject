<!-- login.php -->

<?php
session_start();

include "userdb.php";

// Retrieve the login form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform user authentication
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // User credentials are valid, store user information in session
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    // Invalid credentials, redirect back to login page
    header("Location: index.php");
}

$conn->close();
?>
