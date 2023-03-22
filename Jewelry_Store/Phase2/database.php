<!-- Connecting to database -->
<?php
    $dsn='mysql:host=localhost:3307;dbname=jewelry_store';
    $username='web_user';
    $password='pa55word';

try {
    $db=new PDO($dsn, $username, $password);
    echo '<h2>You are connected to the database.</h2>';
    echo '<p>Logged in as \'' . $username . '\' </p>';
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('database_error.php');
    exit();
}
?>