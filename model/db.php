<?php
$dsn = 'mysql:host=localhost;dbname=vil';
$username = 'root';
//$password = 'pa55word';

try {
    $db = new PDO($dsn, $username);
    //$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = 'Database Error: ';
    $error_message .= $e->getMessage();
    include('view/error.php');
    exit();
}
