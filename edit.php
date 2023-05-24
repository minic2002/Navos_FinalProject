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

// Retrieve the student record from the database
$query = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Student not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System - Edit Student</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Student</h1>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $row['grade']; ?>" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
