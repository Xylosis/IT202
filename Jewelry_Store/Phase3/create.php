<?php
    require_once('../Phase2/database.php');

    $query = 'SELECT * FROM jewelrycategories ORDER BY jewelryCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();

    $categories = $statement->fetchAll();
    $statement->closeCursor();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Unit 3">
    <title>Form - Finite Jewlers</title>
    <link rel="icon" href="../images/broken infinity.jpg">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <figure>
            <img src="../images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Create Form - Finite Jewelers</h1>
        <nav>
            <ul id = "links">
                <li id="formlinkli"> <a href="../home.php"> Home Page </a> </li>
                <li> <a href="../Phase2/show.php"> Inventory </a> </li>
                <li> <a href="../contact.php"> Contact Us! </a> </li>
            </ul>
        </nav>
    </header>
    <main> <!-- A LOT of printing -->
    <h2>Label Form</h2>
    <?php if(!empty($error_message)) { ?> <p id="errormsg">ERROR: <?php echo htmlspecialchars($error_message); ?></p>  <?php } ?>
    <form action="add_jewelery.php" method="Post">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value=" <?php echo $category['jewelryCategoryID'] ?> ">
                    <?php echo $category['jewelryCategoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select> <br> <br><br>
    </form>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>