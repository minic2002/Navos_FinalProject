<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="static/image/student-icon.png" type="image/x-icon">
        <link rel="stylesheet" href="static/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="static/custom-css/navos_finalproject.css">
        <title>Student Management System | Login</title>
    </head>
    <body>
        <div class="container center">
            <div class="card card-size">
                <div class="card-body">
                    <h2 class="card-title text-center">LOGIN</h2>
                    <form method="post" action="action/login.php">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" onkeypress="return event.charCode != 32" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeypress="return event.charCode != 32" required>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="static/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
