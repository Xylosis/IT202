<?php
    session_start();
    
    //Slide 23
    $_SESSION = []; //clears all session data.
    session_destroy(); //clean up session ID.

    $login_message = 'You have been logged out.';
    header('Location: ../home.php ');
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>