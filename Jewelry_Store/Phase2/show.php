<?php
require('database.php');

// Get category ID on page reset
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}
 
// set up queries and get the names for each variable to refer to the database
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
 
// set up queries and collect products within selected category
$queryProducts = 'SELECT * FROM jewelry
                  WHERE jewelryCategoryID = :category_id
                  ORDER BY jewelryID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id); #replacing category id with variable category id with value
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

session_start();

if(!isset($_SESSION['is_valid_admin'])){
    $_SESSION['is_valid_admin'] = false;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jeweler Website IT202 Phase 2">
    <meta name="date" content="3/1/2023">
    <meta name="coursename & section" content="IT202 - 004">
    <meta name="Assignment name" content="Jewelry store phase 2">
    <meta name="email" content="ajd93@njit.edu">
    <title>Inventory - Finite Jewelers</title>
    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="show.css" />
    <link rel="icon" href="../images/broken infinity.jpg">
    <link rel="stylesheet" href="../Phase4/phase4.css">
</head>
<body>
    <div id="abortDel">
        <h5>Delete has been aborted</h5>
    </div>
<header>
        <figure>
            <img src="../images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Inventory - Finite Jewelers</h1>
        <?php if($_SESSION['is_valid_admin'] == true){?>
        <h3 id="welcomeMsg"><?php echo "Welcome, " . $_SESSION['firstName'] ." ". $_SESSION['lastName'] . " (" . $_SESSION['email'] . ")."; ?></h3>
        <?php } ?>
        <nav> <!-- Nav bar to other pages -->
            <ul id = "links">
                <li id="formlinkli"> <a href="../home.php"> Home Page </a> </li>
                <?php if($_SESSION['is_valid_admin'] == true){ ?> <li> <a href="../form.php"> Shipping Form </a> </li><?php } //hides form button only if user is signed out.?>
                <li> <a href="../contact.php"> Contact Us! </a> </li>
                <?php if($_SESSION['is_valid_admin'] == false){ ?><li><a class="navLinks" href="../Phase4/login.php">Login</a></li><?php } //shows login button only if user is signed out.?>
                <?php if($_SESSION['is_valid_admin'] == true){ ?><li><a class="navLinks" href="../Phase4/logout.php">Logout</a></li><?php } //shows logout button only if user is signed in.?>
            </ul>
        </nav>
    </header>
<main>
    <h1>Product List</h1>
    <aside>
        <h2>Categories</h2>
        <ul id="jChoiceUL">
            <?php foreach ($categories as $category) : ?> <!-- Looping through database to display options -->
            <li id="jFilter">
                <a id= "jLinks" href="?category_id=<?php echo $category['jewelryCategoryID']; ?>">
                    <?php echo $category['jewelryCategoryName']; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>     
    </aside>
    <section>
        <h2><?php echo $category_name; ?></h2>
        <h3>Click an item's code to see that item's details page!</h3>
        <table id="displayInfo">
            <tr class="categoryInfoHead">
                <?php if($_SESSION['is_valid_admin'] == true){ ?><th class = "jDisplay" >Delete?</th> <?php } ?>
                <th class = "jDisplay" >Code</th>
                <th class = "jDisplay" >Name</th>
                <th class = "jDisplay" >Description</th>
                <th class = "jDisplay" >Price</th>
                <th class = "jDisplay" class="right">Date/Time Added</th>
            </tr>
            <?php foreach ($products as $product) : ?> <!-- Looping through database to show item information -->
            <tr class="categoryInfo"> <!-- action="../Phase4/delete_entry.php" -->
                <?php if($_SESSION['is_valid_admin'] == true){ ?> <td class = "jDisplay" id="jDelete"> <form action="../Phase4/delete_entry.php" method="Post" id="deleteForm"><input type="hidden" name="jCodeDel" value="<?php echo $product['jewelryCode']; ?>"><input type="submit" id="deletebtnSQL"  class="theDeleteBtn" value="Delete Entry"></form> </td> <?php } ?>
                <td class = "jDisplay" id="jCode"><a id="detailLink" href="../Phase5/details.php?jewelry_id=<?php echo $product['jewelryID'];?>"><?php echo $product['jewelryCode']; ?></a></td>
                <td class = "jDisplay" id="jName"><?php echo $product['jewelryName']; ?></td>
                <td class = "jDisplay" id="jDescription"><?php echo $product['description']; ?></td>
                <td class = "jDisplay" id="jPrice"><?php echo $product['price'] . ' USD'; ?></td>
                <td class = "jDisplay" id="jDate" class="right"><?php echo $product['dateAdded']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <br>
    <?php if($_SESSION['is_valid_admin'] == true){ ?> 
    <h2 style="margin-bottom:.4em;">Have something to sell?</h2>
    <a href="../Phase3/create.php" class="formbuttons">Click here to add your Jewelery to our Inventory.</a>
    <?php } //hides link to add items from logged out users.?> 
</main>    
    <footer>        
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    <script src="../Phase5/index.js"></script>
</body>
</html>
