<?php

    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */

    //if there is a HTTP_REFERER (url of prev page where they were redirected from), print it.
    session_start();
    if (isset($_SERVER['HTTP_REFERER'])){
        $page_req = $_SERVER['HTTP_REFERER'];
    } else {
        $page_req = "the 'Create' or 'Shipping Form' pages.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../Phase3/phase3.css">
    <link rel="stylesheet" href="phase4.css">
</head>
<body>
    <main>
        <h1>Finite Jewelers</h1>
        <img src="../images/broken infinity.jpg" alt="logo" id="logo"> <br>
        <nav>
        <ul id="links">
            <li><a href="../home.php" id="formlinkli"> Home Page </a></li>
            <li><a class="navLinks" href="login.php">Login</a></li>
        </ul>
    </nav>
    <h1 id="errormsgU"> <!-- error message for trying to access shipping form or create form while not logged in -->
        ERROR: Access Denied. <br> You must be logged in to access: <?php echo " $page_req"; ?>
    </h1>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>