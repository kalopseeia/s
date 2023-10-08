<!-- navbar head -->

<style>
    #mainheader {
        background-size: cover;
        background-image: url("../assets/img/bckground.png");
        width: 100%;
        height: 93vh;
    }
</style>
<div class="offset-sm-2">
    <ul class="nav justify-content-end bg-dark">
        <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
        </li>
    </ul>
    <div id="mainheader">



        <?php
        $currentURL = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $currentURL .= 's';
        }
        $currentURL .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $basename = basename($currentURL);

        if ($basename === 'dashboard.php') {
            // Your code to execute when the basename is "dashboard.php"
            include_once "main.php" ;
        } else {
            // Code to execute when the basename is not "dashboard.php"
            echo "The basename is not 'dashboard.php'.";
        }
        ?>



    </div>

</div>



<!-- navbar footer -->