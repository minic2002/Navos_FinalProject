<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: /Navos_FinalProject");
    exit();
}

include "action/userdb.php";

// Retrieve all student records
$query = "SELECT * FROM students";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="static/image/student-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="static/bootstrap/css/bootstrap.min.css">
    <title>Student Management System | Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Student Management System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">Welcome, <?php echo $_SESSION['full_name']; ?>!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="action/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-4">Add New Student</h2>
                <form method="post" action="action/create">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" min=1 placeholder="Age" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade" required>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
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
                                echo "<td><a href='action/edit?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> | <a href='action/delete?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
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
    <script src="static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
