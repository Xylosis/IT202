<?php
    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */
    session_start();

    //require_once('../Phase2/database.php');

    function get_hashed($email, $password){
        require('../Phase2/database.php');
        //query
        $query = 'SELECT firstName, lastName, password FROM jewelrymanagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
    //Save firstname, lastname, and email vars to Session array
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['email'] = $email;
    //if nothing is returned, user doesn't exist in db.
    if($row == false) {
        return false;
    } //grab hashed password from sql response
    $hash = $row['password'];

    return $hash;
}

?>