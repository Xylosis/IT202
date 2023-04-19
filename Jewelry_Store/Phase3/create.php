<?php

    //Name: Andrew Dickman
    //Date: 3/22/23
    //IT202 - 004
    //Phase 3 - Create Page

    require_once('../Phase2/database.php');
    //Grabbing all categories from database for drop down menu.
    $query = 'SELECT * FROM jewelrycategories ORDER BY jewelryCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();

    $categories = $statement->fetchAll();
    $statement->closeCursor();
    //Declaring variables for name and description.
    if(!isset($name) ) { $name = ''; }
    if(!isset($descr) ) { $descr = ''; }

    session_start();
    //redirect user to unauthorized.php error page if they are logged out and try to access page.
    if(!isset($_SESSION['is_valid_admin']) || $_SESSION['is_valid_admin'] == false){
        header("Location: ../Phase4/unauthorized.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Phase 3 - Create Page">
    <meta name="date" content="3/22/2023">
    <meta name="coursename & section" content="IT202 - 004">
    <meta name="Assignment name" content="Jewelry store phase 3">
    <meta name="email" content="ajd93@njit.edu">
    <title>Inventory Form - Finite Jewlers</title>
    <link rel="icon" href="../images/broken infinity.jpg">
    <link rel="stylesheet" href="../Phase2/show.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="phase3.css">
</head>
<body>
    <div id="abortDel">
        <h5>Form Inputs are not Valid</h5>
    </div>
    <header>
        <figure>
            <img src="../images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Inventory Form - Finite Jewelers</h1>
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
    <main> <!-- Displays the form -->
    <section id="addForm">
    <h2>Inventory Addition Form</h2>
    <?php if(!empty($error)) { ?> <p id="errormsg">ERROR: <?php echo htmlspecialchars($error); ?></p>  <?php } ?> <!-- Displays error msg -->
    <form action="add_jewelery.php" method="Post" id="addJewelForm"> <!-- add_jewelery.php -->
        <label for="category_id" class="addformlbl" >Category:</label>
        <select name="category_id" id="category_id"> <!-- Displays drop down menu -->
            <?php foreach ($categories as $category) : ?>
                <option id="dropdownop" value=" <?php echo $category['jewelryCategoryID'] ?> ">
                    <?php echo $category['jewelryCategoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select> <br> <br><br>
        <label for="Code" class="addformlbl">Code: </label>
        <input style="-webkit-appearance: none; -moz-appearance: textfield; margin: 0;" type="number" min="1000" max="9999" id="code" name="code" class="txtinputform" placeholder="1000-9999" required> <span id="nextCode" style="color:darkred;">*</span> <br><br>
        <label for="Name" class="addformlbl">Name: </label> 
        <input type="text" id="name" name="name" class="txtinputform" placeholder="Diamond Ring" required> <span id="nextName" style="color:darkred;">*</span> <br><br>
        <label for="List Price" class="addformlbl">Price: </label>
        $ <input type="number" id="price" step="0.01" min="1.00" name="price" class="txtinputform" placeholder="100.99" required> <span id="nextPrice" style="color:darkred;">*</span> <br><br>
         <h3>Description:</h3> 
        <label>
            <textarea cols="50"  rows="7" maxlength="255" name="description" id="description" placeholder="Diamond, 24k Gold, Multistone Embedded, etc." value="<?php echo htmlspecialchars($descr);?>"></textarea> 
        </label>
        <br><br>
        <input type="Submit" class="formbuttons" value="Submit">
        <button type="reset" id="resetBUTTON" class="formbuttons">Reset</button>
            
    </form>
    </section>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    <script src="../Phase5/index.js"></script>
</body>
</html>