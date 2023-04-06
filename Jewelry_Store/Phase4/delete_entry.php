<?php
    //get code from row that delete button is in
    $jCode = filter_input(INPUT_POST, 'jCodeDel', FILTER_VALIDATE_INT);
    //debugging bug will never show up on real page, since user is redirected.
    echo $jCode;
    
    require("../Phase2/database.php");
    //delete query
    $query = 'DELETE FROM jewelry WHERE jewelryCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $jCode);
    $statement->execute();
    $statement->closeCursor();
    
    header("Location: ../Phase2/show.php"); //redirect user back to inventory page with their item category selected.
    exit();

?>  