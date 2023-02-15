<?php
    //get data from the form
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $stradd = filter_input(INPUT_POST, 'straddress');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $shipdate = filter_input(INPUT_POST, 'shipdate');
    $ordernum = filter_input(INPUT_POST, 'ordernum', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'Height', FILTER_VALIDATE_INT);
    $width = filter_input(INPUT_POST, 'Width', FILTER_VALIDATE_INT);
    $length = filter_input(INPUT_POST, 'Length', FILTER_VALIDATE_INT);
    $val = filter_input(INPUT_POST, 'val', FILTER_VALIDATE_FLOAT);
    $shippingtype = filter_input(INPUT_POST,'Shipping');
    $comments = filter_input(INPUT_POST, 'comments');

    $statesarr = array( "AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  
    "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",  
    "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",  
    "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",  
    "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY");

    //field validation  
    if($zip === FALSE || $zip < 0 || strlen($zip) != 5){
        $error_message = 'Zip code must be a valid zip value.';
    } else if ($ordernum === FALSE || $ordernum < 0){
        $error_message = 'Order Number must be a valid positive number.';
    } else if ($height === FALSE || $height < 0 || $height > 36){
        $error_message = 'Package height must be a valid positive number no more than 36 inches.';
    } else if ($width === FALSE || $width < 0 || $width > 36){
        $error_message = 'Package width must be a valid positive number no more than 36 inches.';
    } else if ($length === FALSE || $length < 0 || $length > 36){
        $error_message = 'Package length must be a valid positive number no more than 36 inches.';
    } else if ($val === FALSE || $val < 0){
        $error_message = 'Shipment Value must be a valid positive number.';
    } else if (!(is_string($fname) || is_string($lname))){
        $error_message = 'Please enter a valid name.';
    } else if (!is_string($city)){
        $error_message = 'Please enter a valid city.';
    } else if (!is_string($state)){
        $error_message = 'Please enter a valid state.';
    }
    
    if(!isset($error_message) ) { $error_message = ''; }
    
    if($error_message != ''){
        include('form.php');
        exit();
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Unit 3">
    <title>Shipping Label - Finite Jewelers</title>
    <link rel="icon" href="images/broken infinity.jpg">
    <link rel="stylesheet" href="testing.css">
</head>
<body>
    <h1 id="Shippingtitle">Shipping Label</h1>
    <div id="shiplbl">
        <label for="logo" id="lblbrandname">Finite <br> Jewlers</label>
        <img src="images/broken infinity.jpg" alt="logo" id = "labellogo"> 
        <label id="fromaddr" class="info"> From: 726 Centrus Ave, Las Vegas, NV, 88901</label>  <br>
        <label for="toaddr" class="labellbl">To:</label>
        <span id="toaddr" class="info"><?php echo $stradd .', '. $city .', '. $state .', '. $zip; ?></span> <br>
        <label for="dimensions"class="labellbl">Package Dimensions:</label> 
        <span id="dimensions" class="info"><?php echo $height .'×'. $width .'×'. $length .' in³'; ?></span> <br>
        <label for="declval" class="labellbl">Declared Value of Package:</label> 
        <span id="declval" class="info"><?php echo '$'. $val; ?></span> <br>
        <label id="shippingcomp" class="info">Shipping Company: FedEx</label> <br>
        <label for="Shipping Class" class="labellbl">Shipping Class:</label>
        <span id="Shipping Class" class="info"><?php echo $shippingtype?></span> <br>
        <span id="trackingnum" class="info">Tracking Number: 123456ABC</span> <br>
        <label for="comms" class="labellbl">Comments:</label>
        <span id="comments" class="info"><?php echo $comments ?></span> <br>
        <img src="images/barcode.png" alt="Shipping Barcode"> <br> <br>
        <label for="ordernum" class="labellbl">Order Number:</label>
        <span id="ordernum" class="info"><?php echo $ordernum ?></span> <br>
        <label for="shipdate" class="labellbl">Ship Date:</label>
        <span id="shipdate" class="info"><?php echo $shipdate ?></span> <br>
    </div>
</body>
</html>