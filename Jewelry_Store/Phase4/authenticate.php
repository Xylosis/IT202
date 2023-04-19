<?php

    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */

    require_once('admin_db.php');
    //session_start();

    //Slide 22
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    //hashed password from database
    $hashed = get_hashed($email,$password);

    //verifying password inputted vs hashed password in db
    $verify_admin = password_verify($password, $hashed);

    if($verify_admin){
        $_SESSION['is_valid_admin'] = true; //can save multiple things in session array, such as pictures and stuff
        //echo "<p>You have successfully logged in as " . $email . ".</p>";
        $_SESSION['login_message'] = "Logged in as "  . $email;
        //header('Location: ' . $_SERVER['HTTP_REFERER']); //save just in case
        header("Location: ../home.php");
        exit();
    } else {
        //Tests: valid email/password login, valid email but wrong password, wrong email, blank email or password.
        $_SESSION['is_valid_admin'] = false; //reset the call when logging out to each page, so the logged out display is shown for each page.
        if($email == NULL && $password == NULL){
            $login_message = 'You must login to view this page!';
        } else {
            $login_message = 'Invalid Email / Password Combination.';
        }
        include('login.php'); //send user back to login page w/ error msg
        exit();
    }
    echo "_SESSION STATUS: " . $_SESSION['is_valid_admin']; //debugging, SHOULD NEVER HIT.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged in.</title>
</head>
<!-- Just testing, will never hit. -->
<body>
    <?php if($_SESSION['is_valid_admin'] == true){ ?><a href="logout.php">Logout</a><?php } //shows logout button only if user is signed in.?> 
</body>
</html>