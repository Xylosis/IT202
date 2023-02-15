<?php 
    if(!isset($fname) ) { $fname = ''; } //checking if a variable called investment exists, if not, create.
    if(!isset($lname) ) { $lname = ''; }
    if(!isset($stradd) ) { $stradd = ''; }
    if(!isset($city) ) { $city = ''; }
    if(!isset($state) ) { $state = ''; }
    if(!isset($zip) ) { $zip; }
    if(!isset($shipdate) ) { $shipdate = ''; }
    if(!isset($ordernum) ) { $ordernum; }
    if(!isset($Height) ) { $Height; }
    if(!isset($Width) ) { $Width; }
    if(!isset($Length) ) { $Length; }
    if(!isset($val) ) { $val; }
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
    <link rel="icon" href="images/broken infinity.jpg">
    <link rel="stylesheet" href="testing.css">
</head>
<body>
    <header>
        <figure>
            <img src="images/broken infinity.jpg" alt="logo">
        </figure>
        <h1>Shipping Form - Finite Jewelers</h1>
        <nav>
            <ul id = "links">
                <li id="formlinkli"> <a href="home.php"> Home Page </a> </li>
                <li> <a href="contact.php"> Contact Us! </a> </li>
            </ul>
        </nav>
    </header>
    <main>
    <h2>Label Form</h2>
    <?php if(!empty($error_message)) { ?> <p id="errormsg">ERROR: <?php echo htmlspecialchars($error_message); ?></p>  <?php } ?>
    <form action="label.php" method="Post">
        <div id="deliveryinfo">
            <h3 style="margin-bottom: 1.5rem;">Delivery Information:</h3>
            <div class="inputfields">
                <label for="fname">First Name: </label>
                <input type="text" name = "fname" placeholder="John" value="<?php echo htmlspecialchars($fname);?>" required>
                <label for="lname" class="secondinputfield">Last Name: </label>
                <input type="text" name = "lname" id="lname" placeholder="Doe" value="<?php echo htmlspecialchars($lname);?>" required>
            </div>
            <br>
            <div class="inputfields" class = "nowrap">
                <label for="straddress">Street Address:</label>
                <input type="text" name = "straddress" id="straddress" placeholder="123 Marshall Road" value="<?php echo htmlspecialchars($stradd);?>" required>
            </div>    
            <br>
            <div class="inputfields">
                <label for="city" class="secondinputfield">City:</label>
                <input type="text" name = "city" id="city" placeholder = "Newark" value= "<?php echo htmlspecialchars($city);?>" required>
                <label for="state" class="secondinputfield">State: </label>
                <input type="text" style = "width: 1.5rem;" name = "state" id="state" placeholder = "NJ" value="<?php echo htmlspecialchars($state);?>" required>
                <label for="zip" class="secondinputfield">ZIP Code: </label>
                <input style="-webkit-appearance: none; -moz-appearance: textfield; margin: 0; width: 3rem;" type="number" name = "zip" id="zip" placeholder = "07422" value="<?php echo htmlspecialchars($zip);?>" required>
            </div>
        </div>
        <h3>Other Information:</h3>
        <label for="shipdate">Enter the shipdate :</label>
        <input type="date" name="shipdate" value="<?php echo htmlspecialchars($shipdate);?>" required> <br><br>
        <label for="ordernum">Enter the order number:</label>
        <input style="-webkit-appearance: none; -moz-appearance: textfield; margin: 0;" type="number" name = "ordernum" id = "ordernum" value="<?php echo htmlspecialchars($ordernum);?>" required> <br><br>
        <label for="dimensions">Enter the dimensions of your package: </label>
        <input type="number" name = "Height" class="dimensions" placeholder = "Height" value="<?php echo htmlspecialchars($Height);?>" required>
        <input type="number" name = "Width" class="dimensions" placeholder = "Width" value="<?php echo htmlspecialchars($Width);?>" required>
        <input type="number" name = "Length" class="dimensions" placeholder = "Length" value="<?php echo htmlspecialchars($Length);?>" required> <br><br>
        <label for="val">Enter the value of the package: </label>$
        <input type="number" name="val" id="val" step="0.01" placeholder = "MAX: $150.00" value="<?php echo htmlspecialchars($val);?>" required> <br><br>
        <h3>Shipping Type</h3>
        <input type="Radio" name="Shipping" id="NextDay" Value="Next Day Shipping">Next Day Shipping
        <input type="Radio" name="Shipping" id="Priority" Value="Priority Shipping">Priority Shipping
        <input type="Radio" name="Shipping" id="Standard" Value="Economic Shipping" checked="checked">Standard Shipping <br><br>
        <h3>Comments</h3>
        <label>
            <textarea cols="50"  rows="10" name="comments" placeholder="Fragile, please be careful. etc." value="<?php echo htmlspecialchars($comments);?>"></textarea>
        </label> <br> <br>
        <input type="Submit" class="formbuttons" value="Submit">
        <button type="reset" class="formbuttons">Reset</button>
    </form>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>