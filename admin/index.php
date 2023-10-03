<?php
// session_start();
// // Check if the user is already logged in
// if (isset($_SESSION['username'])) {
//     // User is already logged in, redirect to another page or display a message
//     header("Location: ../templates/Err403.php"); // Redirect to the admin dashboard or another page
//     exit();
// }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin | Sign-In</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="../assets/js/jquery.min.js"></script>
    <style>
        body {
            background-image: url('../assets/img/bckground.png');
            background-size: cover;
        }

        h3 {
            padding-top: 1em;
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
            font-size: 14px;
        }

        .dformcntr {
            width: 400px;
            height: 400px px;
            background-color: #fff;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
            overflow: auto;
            padding: 1em 2em;
            border-bottom: 2px solid #ccc;
            display: table;
        }
    </style>
</head>

<body>
    <div class="dformcntr">
        <div class="hdcnt">
            <h3>Login</h3>
            <hr>
            <form action="includes/functions.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
                <!-- <hr>
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p> -->
            </form>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>