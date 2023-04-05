<?php
    require_once('admin_db.php');
    session_start();

    //Slide 22
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    $hashed = get_hashed($email,$password);

    //echo "hashed: $hashed <br> password_hash function: "; //first output

    //echo password_hash($password, PASSWORD_DEFAULT);
    //echo "<br> holder: ";
    $verify_admin = password_verify($password, $hashed);
    //echo $holder;
    //echo "<br>";
    /*
    if(password_verify($password, $hashed)){
        echo "<h1>worked</h1>";
    } else {
        echo "<h1>nope</h1>";
    }
    */
    if($verify_admin){
        $_SESSION['is_valid_admin'] = true; //can save multiple things in session array, such as pictures and stuff
        //echo "<p>You have successfully logged in as " . $email . ".</p>";
        $_SESSION['login_message'] = "Logged in as "  . $email;
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        header("Location: ../home.php");
        exit();
        //require_once('print_session.php');
    } else {
        //Tests: valid email/password login, valid email but wrong password, wrong email, blank email or password.
        $_SESSION['is_valid_admin'] = false;
        if($email == NULL && $password == NULL){
            $login_message = 'You must login to view this page!';
        } else {
            $login_message = 'Invalid credentials';
        }
        //include('login.php');
        //exit();
    }
    echo "_SESSION STATUS: " . $_SESSION['is_valid_admin']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged in.</title>
</head>
<body>
    <?php if($_SESSION['is_valid_admin'] == true){ ?><a href="logout.php">Logout</a><?php } //shows logout button only if user is signed in.?> 
</body>
</html>