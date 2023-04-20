<?php

    $jewelry_id = filter_input(INPUT_GET, 'jewelry_id', FILTER_VALIDATE_INT);

    session_start();
    //so it doesnt give an undeclared array index error
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
    <title>Error: Item Doesn't Exist - Finite Jewelers</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../Phase3/phase3.css">
    <link rel="stylesheet" href="phase4.css">
</head>
<body>
    <header>
        <figure>
            <img src="../images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Details Page - Finite Jewelers</h1>
        <?php if($_SESSION['is_valid_admin'] == true){?>
        <h3 id="welcomeMsg"><?php echo "Welcome, " . $_SESSION['firstName'] ." ". $_SESSION['lastName'] . " (" . $_SESSION['email'] . ")."; ?></h3>
        <?php } ?>
        <nav> <!-- Nav bar to other pages -->
            <ul id = "links">
                <li id="formlinkli"> <a href="../home.php"> Home Page </a> </li>
                <li> <a href="../Phase2/show.php"> Inventory </a> </li>
                <li> <a href="../contact.php"> Contact Us! </a> </li>
                <?php if($_SESSION['is_valid_admin'] == false){ ?><li><a class="navLinks" href="../Phase4/login.php">Login</a></li><?php } //shows login button only if user is signed out.?>
                <?php if($_SESSION['is_valid_admin'] == true){ ?><li><a class="navLinks" href="../Phase4/logout.php">Logout</a></li><?php } //shows logout button only if user is signed in.?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>ITEM DOESN'T EXIST</h1>
        <p style="font-size: x-large;">Sorry, but the item with a corresponding ID of '<?php echo $jewelry_id; ?>' doesn't exist within our database.</p>
        <p style="font-size: large; margin-bottom:3rem;"> If you believe this is an issue, please contact us at the email below.</p>
        <a href="emailto:ajd93@njit.edu" style="color:white; background-color: rgb(28, 3, 28); border: rgb(104, 9, 102) solid; border-radius:1rem;
    padding:1rem 2.5rem;">EMAIL : ajd93@njit.edu</a>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>