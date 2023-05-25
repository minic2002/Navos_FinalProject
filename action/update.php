<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../ ");
    exit();
}

include "userdb.php";

// Retrieve the form data
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

if (strlen(trim($name)) > 0 && strlen(trim($grade)) > 0) {
    // Update the student record in the database
    $query = "UPDATE students SET name = '$name', age = $age, grade = '$grade' WHERE id = $id";
    $result = $conn->query($query);

    if ($result) {
        header("Location: ../dashboard");
    } else {
        echo "Error updating student record: " . $conn->error;
    }
}
else {
    header("Location: edit?id=$id");
}

$conn->close();
?>
