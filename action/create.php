<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../");
    exit();
}

include "userdb.php";

// Retrieve the form data
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

if (strlen(trim($name)) > 0 && strlen(trim($grade)) > 0) {
    // Insert the new student record into the database
    $query = "INSERT INTO students (name, age, grade) VALUES ('$name', $age, '$grade')";
    $result = $conn->query($query);

    if ($result) {
        header("Location: ../dashboard");
    } else {
        echo "Error creating student record: " . $conn->error;
    }
}
else {
    header("Location: ../dashboard");
}

$conn->close();
?>
