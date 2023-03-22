<?php
//Andrew Dickman
//3/22/2023
//IT202 - 004
//Phase 3 - Create Page

//get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$descr = filter_input(INPUT_POST, 'description');

if(!isset($error) ) { $error = ''; }

//basic validation
if($category_id == NULL || $category_id == FALSE || $code == NULL || $name == NULL || $price == NULL || $price == FALSE) {
    $error = 'Invalid product data, check all fields and try again.';
}

if($descr == NULL){
    $error = 'Description left empty, please enter a description and try again.';
}

if(is_numeric($name)){
    if($error != ''){ //appending to show multiple error messages at once.
        $error .= `\n\n` . ' ERROR: Product Name contains a number, only enter characters.';
    }
    else{ //only error message so far.
        $error = 'Product Name contains a number, only enter characters.';
    }
}

if(!isset($error) ) { $error = ''; }

if($error != '') { //send error messages to the form.
    include('create.php');
    exit();
}

$descr = htmlspecialchars($descr); //SQL / HTML validation
$name = htmlspecialchars($name);

require_once('../Phase2/database.php');
//----------------------------------------------------------------------------------------
//Error Handling in case the code already exists in the database
//I didn't want to put this into a function to be safe, sorry.
$query = 'SELECT jewelryCode FROM jewelry';
$statement = $db->prepare($query);
$statement->execute();
$codes = $statement->fetchAll();
echo $code;
sort($codes);
for ($i = 0; $i < count($codes)-1; $i++){
    if($code == $codes[$i][0]){
        if($code+1 == $codes[$i+1][0] || $code == 9999){
            $error="Code '$code' is already in use. Please try a different code.";
        }
        else{
            $error="Code '$code' is already in use. Please try a different code, such as: " . $code+1 . ".";
        }
        include('create.php');
        exit();
    }
}
//------------------------------------------------------------------------
//add the product to the database
$query = 'INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
(:category_id, :code, :name, :descr, :price, NOW())';

$statement = $db->prepare($query);

$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':descr', $descr);
try{
$success = $statement->execute();
}
catch(PDOException $exception){
    if ($exception->getCode() == 23000) { //In case same code error was missed before.
        $error="Code '$code' is already in use. Please try a different code.";
        include('create.php');
        exit();
    }
}
$statement->closeCursor();

header("Location: ../Phase2/show.php?category_id=$category_id"); //redirect user back to inventory page with their item category selected.
exit();

?>