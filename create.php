<!-- create.php -->

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "userdb.php";

// Retrieve the form data
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

// Insert the new student record into the database
$query = "INSERT INTO students (name, age, grade) VALUES ('$name', $age, '$grade')";
$result = $conn->query($query);

if ($result) {
    header("Location: dashboard.php");
} else {
    echo "Error creating student record: " . $conn->error;
}

$conn->close();
?>
