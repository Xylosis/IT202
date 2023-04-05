<?php

    $jCode = filter_input(INPUT_POST, 'jCodeDel', FILTER_VALIDATE_INT);

    echo $jCode;
    
    require("../Phase2/database.php");

    $query = 'DELETE FROM jewelry WHERE jewelryCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $jCode);
    $statement->execute();
    $statement->closeCursor();
    
    header("Location: ../Phase2/show.php"); //redirect user back to inventory page with their item category selected.
    exit();

?>  