<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../dashboard");
    exit();
}

include "userdb.php";

// Retrieve the login form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform user authentication
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);
$user = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
    // User credentials are valid, store user information in session
    $_SESSION['username'] = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];
    header("Location: ../dashboard");
} else {
    // Invalid credentials, redirect back to login page
    header("Location: ../ ");
}

$conn->close();
?>
