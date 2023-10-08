<?php
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    // User is already logged in, redirect to another page or display a message
    header("Location: ../templates/Err403.php"); // Redirect to the admin dashboard or another page
    exit();
}

$servername = "localhost"; // The hostname of your MySQL server
$username = "root";        // MySQL username (default in XAMPP is "root")
$password = "";            // MySQL password (default in XAMPP is blank)
$dbname = "tools_Equipment"; // Replace with the name of your database

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- dbconnection -->