<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "userdb.php";

// Retrieve all student records
$query = "SELECT * FROM students";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System - Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Student Management System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">Welcome, <?php echo $_SESSION['username']; ?>!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-4">Create New Student</h2>
                <form method="post" action="create.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade:</label>
                        <input type="text" class="form-control" id="grade" name="grade" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Create">
                </form>
            </div>
            <div class="col">
                <h2 class="mt-4">Student Records</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['age'] . "</td>";
                                echo "<td>" . $row['grade'] . "</td>";
                                echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
