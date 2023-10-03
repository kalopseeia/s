<?php
require_once "../includes/db.php";

session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header("Location: logout.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

	<script src="../assets/js/angular.js"></script>
	<script src="../assets/js/highcharts.src.js"></script>
	<script src="../assets/js/chart.js"></script>
	<script src="../assets/js/jquery.min.js"></script>

	<!-- headers admin -->