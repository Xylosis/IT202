<?php
    session_start();
    if(!isset($_SESSION['is_valid_admin'])){
        $_SESSION['is_valid_admin'] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Unit 3">
    <title>Contact - Finite Jewelers</title>
    <link rel="icon" href="images/broken infinity.jpg">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="images/broken infinity.jpg" alt="logo">
    <head> <!-- NOT FUNCTIONAL YET.. IGNORE -->
    <h1>Contact Us Page will be functional shortly!</h1>
    <nav>
    <?php if($_SESSION['is_valid_admin'] == true){?>
        <h3 id="welcomeMsg"><?php echo "Welcome, " . $_SESSION['firstName'] ." ". $_SESSION['lastName'] . " (" . $_SESSION['email'] . ")."; ?></h3>
        <?php } ?>
        <ul id="links">
            <li><a href="home.php" id="formlinkli"> Home Page </a></li>
            <?php if($_SESSION['is_valid_admin'] == false){ ?><li><a class="navLinks" href="./Phase4/login.php">Login</a></li><?php } //shows login button only if user is signed out.?>
            <?php if($_SESSION['is_valid_admin'] == true){ ?><li><a class="navLinks" href="./Phase4/logout.php">Logout</a></li><?php } //shows logout button only if user is signed in.?>
        </ul>
    </nav>
    </head>
</body>
</html>

