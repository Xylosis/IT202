<?php

    session_start();

    //require_once('../Phase2/database.php');

    function get_hashed($email, $password){
        require('../Phase2/database.php');

        $query = 'SELECT firstName, lastName, password FROM jewelrymanagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['email'] = $email;

    if($row == false) {
        return false;
    }
    $hash = $row['password'];

    return $hash;
}

?>