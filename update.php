<!-- update.php -->

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "userdb.php";

// Retrieve the form data
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

// Update the student record in the database
$query = "UPDATE students SET name = '$name', age = $age, grade = '$grade' WHERE id = $id";
$result = $conn->query($query);

if ($result) {
    header("Location: dashboard.php");
} else {
    echo "Error updating student record: " . $conn->error;
}

$conn->close();
?>
