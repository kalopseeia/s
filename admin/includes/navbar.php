<?php
$currentURL = 'http';
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $currentURL .= 's';
}
$currentURL .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$basename = basename($currentURL);

?>

<!-- navbar head -->

<style>
    #mainheader {

        <?php
        // if ($basename === 'dashboard.php' || $basename === 'additem.php') {

        if ($basename === 'dashboard.php') {
            echo 'background-image: url("../assets/img/bckground.png");background-size: cover;width: 100%;height: 93vh;';
        } else {
            echo 'background-color: #f4f5fa;';
        }
?>

    }
</style>
<div class="offset-sm-2">
    <div>
        <ul class="nav justify-content-end bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="./logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div id="mainheader">

        <?php
        
if ($basename === 'dashboard.php') {
    // Your code to execute when the basename is "dashboard.php"
    include_once "main.php" ;
} else {
    // Code to execute when the basename is not "dashboard.php"
    echo "The basename is not 'dashboard.php'.";
}
?>




        <!-- navbar footer -->