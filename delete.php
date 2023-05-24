<!-- delete.php -->

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "userdb.php";

// Retrieve the student ID from the URL parameter
$id = $_GET['id'];

// Delete the student record from the database
$query = "DELETE FROM students WHERE id = $id";
$result = $conn->query($query);

if ($result) {
    header("Location: dashboard.php");
} else {
    echo "Error deleting student record: " . $conn->error;
}

$conn->close();
?>
