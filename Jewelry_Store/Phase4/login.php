<?php

    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */


if(session_status() !== 2){ //so you dont get the note that it got ignored, if session_status() returns 2, then session already started.
    session_start(); //if getting errors, remove everything around this session start, the if, and check what session_status() returns
} //set up variables 
if (!isset($login_message)) {
    $login_message = '';
} 
if(!isset($_SESSION['is_valid_admin'])){
    //echo "SETTING!";
    $_SESSION['is_valid_admin'] = false; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Finite Jewelers</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../Phase3/phase3.css">
    <link rel="stylesheet" href="phase4.css">
</head>
<body>
    <h1>Finite Jewelers</h1>
    <img src="../images/broken infinity.jpg" alt="logo" id="logo"> <br>
    <main>
        <nav> <!-- Nav bar to other pages -->
            <ul id = "links">
                <li id="formlinkli"> <a href="../home.php"> Home Page </a> </li>
                <li> <a href="../Phase2/show.php"> Inventory </a> </li>
                <li> <a href="../contact.php"> Contact Us! </a> </li>
            </ul>
        </nav>
        <h2 style="padding-bottom:1rem;">Login Page</h2>
        <!-- form to log in. -->
        <form action="authenticate.php" id="addForm" method="Post"> 
        <p><?php if($_SESSION['is_valid_admin'] == true){  echo $_SESSION['login_message']; ?></p> 
            <a href="logout.php">Logout</a>
        <?php } else { if($login_message != '') {?> <p id="errormsg"><?php echo $login_message; ?> </p>  <?php }?> <!-- login_message = error message -->
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" placeholder="johndoe@gmail.com" required> <br><br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required> <br><br> 
            <input type="Submit" class="formbuttons" value="Login">
            
        </form>
        <?php }?>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>