<?php

    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */

    session_start();
    
    //Slide 23
    $_SESSION = []; //clears all session data.
    session_destroy(); //clean up session ID.

    $login_message = 'You have been logged out.';
    header('Location: ../home.php ');
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>