<?php
//get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$descr = filter_input(INPUT_POST, 'description');

//basic validation
if($category_id == NULL || $category_id == FALSE || $code == NULL || $name == NULL || $price == NULL || $price == FALSE) {
    $error = 'Invalid product data, check all fields and try again.';
    echo "$error<br>"; //if error chekc here with the <br>
    //exit()
}

require_once('../Phase2/database.php');

//add the product to the database
$query = 'INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
(:category_id, :code, :name, :descr, :price, NOW())';
//5 steps
$statement = $db->prepare($query);

$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':descr', $descr);

$success = $statement->execute();
$statement->closeCursor();

echo "<p>Your insert statement status is $success</p>";

header("Location: ../Phase2/show.php?category_id=$category_id");
exit();

?>