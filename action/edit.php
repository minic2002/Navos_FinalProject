<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../ ");
    exit();
}

include "userdb.php";

$id = $_GET['id'];

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../static/image/student-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../static/bootstrap/css/bootstrap.min.css">
    <title>Student Management System | Edit Student</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../dashboard">Student Management System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">Welcome, <?php echo $_SESSION['full_name']; ?>!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-4">Edit Student</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" min=1 value="<?php echo $row['age']; ?>" placeholder="Age" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $row['grade']; ?>" placeholder="Grade" required>
            </div>
            <div class="form-group text-right">
                <input type="submit" class="btn btn-primary" value="Update">
            </div> 
        </form>
    </div>

    <script src="static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
