<?php
$host = 'localhost'; // Database host
$db_name = 'findaworker'; // Database name
$username = 'root'; // Default username for WAMP
$password = ''; // Default password for WAMP (blank)

try {
    $connection = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
