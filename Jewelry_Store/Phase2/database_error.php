<!DOCTYPE html>
<!-- Will only load if there is an error connecting to the database -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database</p>
        <p>Error message: <?php echo $error_message?></p>
    </main>
</body>
</html>