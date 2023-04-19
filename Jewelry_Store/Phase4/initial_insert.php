<?php

    /*
        Andrew Dickman
        4/5/2023
        IT202-004
        Phase 4 - Jewelry Store Project
        ajd93@njit.edu
    */

//insert function.
function add_jewelry_manager($email, $password, $firstName, $lastName) {

    require('../Phase2/database.php');
    //insert query
    $hash = password_hash($password, PASSWORD_DEFAULT);
    echo "$hash <br>";
    $query = 'INSERT INTO jewelryManagers (emailAddress, password, firstName, lastName)
              VALUES (:email, :password, :firstName, :lastName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

//Inserted Accounts
//------------------------email--------password--firstname--lastname--

//add_jewelry_manager('ajd93@njit.edu', 'abc123', 'Andrew', 'Dickman')
//add_jewelry_manager('dash@riot.com', 'tsm2023', 'James', 'Patterson');
//add_jewelry_manager('faker@gmail.com', 'pentakill', 'Lee', 'Sang-hyeok');

/*
TO ADD ACC FROM ANOTHER PHP (sign up page) USE:

require_once('initial_insert.php');

//add_jewelry_manager($email, $password, $firstName, $lastName); //WORKS
*/

?>