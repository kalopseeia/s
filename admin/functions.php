<?php
require_once "../includes/db.php";
session_start();
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // User is already logged in, redirect to another page or display a message
    header("Location: ./dashboard.php"); // Redirect to the admin dashboard or another page
    exit();

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["username"] = $user["username"];
        header("Location: ./dashboard.php"); // Redirect to the admin dashboard
        exit();
    } else {
        echo "Invalid username or password. <a href='index.php'>Try again</a>";
    }
} else {
    // User is already logged in, redirect to another page or display a message
    header("Location: ../templates/Err403.php"); // Redirect to the admin dashboard or another page
    exit();
}
?>

<!-- login -->