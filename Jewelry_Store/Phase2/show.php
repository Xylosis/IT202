<?php
require('database.php');

// Get category ID
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}
 
// Get name for selected category
$queryCategory = 'SELECT * FROM jewelryCategories
                  WHERE jewelryCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['jewelryCategoryName'];
$statement1->closeCursor();
$queryAllCategories = 'SELECT * FROM jewelryCategories
                       ORDER BY jewelryCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();
 
// Get products for selected category
$queryProducts = 'SELECT * FROM jewelry
                  WHERE jewelryCategoryID = :category_id
                  ORDER BY jewelryID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id); #replacing category id with variable category id with value
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock - Finite Jewelers</title>
    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="show.css">
</head>
<body>
<main>
    <h1>Product List</h1>
    <aside>
        <h2>Categories</h2>
        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php 
                        echo $category['jewelryCategoryID']; ?>">
                    <?php echo $category['jewelryCategoryName']; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>           
    </aside>
    <section>
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th class="right">Time/Date Added</th>
            </tr>
 
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['jewelryCode']; ?></td>
                <td><?php echo $product['jewelryName']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td class="right"><?php echo $product['dateAdded']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>    
<footer></footer>
</body>
</html>
