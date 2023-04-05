<?php
session_start();
if (!isset($login_message)) {
    $login_message = '';
}
if(!isset($_SESSION['is_valid_admin'])){
    echo "SETTING!";
    $_SESSION['is_valid_admin'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../Phase3/phase3.css">
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
        <h3>Login Page</h3>
        <p><?php echo "_SESSION STATUS: " . $_SESSION['is_valid_admin']; ?></p>
        <p><?php if($_SESSION['is_valid_admin'] == true){  echo $_SESSION['login_message']; ?></p> 
            <a href="logout.php">Logout</a>
        <?php } else { if($login_message != '') {?> <p id="errormsg"><?php echo $login_message; ?> </p>  <?php }?>
        <form action="authenticate.php" id="addForm" method="Post">   
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