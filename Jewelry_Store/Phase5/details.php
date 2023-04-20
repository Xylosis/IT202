<?php

    /*
    Andrew Dickman
    4/5/2023
    IT202-004
    Phase 5 - Jewelry Store Project
    ajd93@njit.edu
    */

require_once('../Phase2/database.php');
$jewelry_id = filter_input(INPUT_GET, 'jewelry_id', FILTER_VALIDATE_INT); #grabbing jewelry_id

$queryProduct = 'SELECT * FROM jewelry
                  WHERE jewelryID = :jewelry_id
                  ORDER BY jewelryID';
$statement3 = $db->prepare($queryProduct);
$statement3->bindValue(':jewelry_id', $jewelry_id); #replacing category id with variable category id with value
$statement3->execute();
$product = $statement3->fetchAll();
$statement3->closeCursor();
session_start();

if(!isset($_SESSION['is_valid_admin'])){
    $_SESSION['is_valid_admin'] = false;
}

if(empty($product)){
    header("Location: no_item.php?jewelry_id=$jewelry_id"); //redirect user if item with requested ID doesn't exist.
    exit();
} else{ 
    $jewelryProduct = $product[0]; //set to first array returned by MySQL (so i dont have to use $product[0][1])
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Final Phase - Details Page & JS">
    <meta name="date" content="3/22/2023">
    <meta name="coursename & section" content="IT202 - 004">
    <meta name="Assignment name" content="Jewelry store Final Phase">
    <meta name="email" content="ajd93@njit.edu">
    <title><?php echo $jewelryProduct['jewelryName'];?> Details - Finite Jewelers</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../Phase3/phase3.css">
    <link rel="stylesheet" href="../Phase4/phase4.css">
    <link rel="stylesheet" href="details.css">
</head>
<body>
    <header>
        <figure>
            <img src="../images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Details Page - Finite Jewelers</h1>
        <?php if($_SESSION['is_valid_admin'] == true){?>
        <h3 id="welcomeMsg"><?php echo "Welcome, " . $_SESSION['firstName'] ." ". $_SESSION['lastName'] . " (" . $_SESSION['email'] . ")."; ?></h3>
        <?php } ?>
        <nav> <!-- Nav bar to other pages -->
            <ul id = "links">
                <li id="formlinkli"> <a href="../home.php"> Home Page </a> </li>
                <li> <a href="../Phase2/show.php"> Inventory </a> </li>
                <li> <a href="../contact.php"> Contact Us! </a> </li>
                <?php if($_SESSION['is_valid_admin'] == false){ ?><li><a class="navLinks" href="../Phase4/login.php">Login</a></li><?php } //shows login button only if user is signed out.?>
                <?php if($_SESSION['is_valid_admin'] == true){ ?><li><a class="navLinks" href="../Phase4/logout.php">Logout</a></li><?php } //shows logout button only if user is signed in.?>
            </ul>
        </nav>
    </header>

    <main>
        <h1> <?php echo "'". $jewelryProduct['jewelryName'] . "' Details";?></h1>
        <h3> >> Hover over the image to unblur it! << </h3>
        <div id="itemContainer">
            <div id="deeperContainer">
                <div>
                    <!-- IMAGES ARE DISPLAYED THRU {jewelry_id}.png SO MAKE SURE IMG HAS JEWELRY ID AS ITS FILE NAME -->
                    <img src="../images/<?php echo $jewelry_id;?>b.png" alt="testimg" id="jewelryIMG">
                </div>
                <div class="itemText">
                    <p><b>Item Code: </b> <?php echo $jewelryProduct['jewelryCode'] ?></p>
                    <p><b>Item Name: </b> <?php echo $jewelryProduct['jewelryName'] ?></p>
                    <p><b>Item Description: </b> <?php echo $jewelryProduct['description'] ?></p>
                    <p><b>Item Price: </b><?php echo $jewelryProduct['price'] ?></p>
                    <p><b>Date Added: </b><?php echo $jewelryProduct['dateAdded'] ?></p>
                </div>
            </div>
        </div>
        
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    <script src="../Phase5/index.js"></script>
</body>
</html>