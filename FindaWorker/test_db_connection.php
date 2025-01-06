<?php
include 'db_connect.php'; // Include the database connection file

// Test the connection and query the tables
try {
    $result = $connection->query("SHOW TABLES");

    // Check if the users table exists
    $tables = $result->fetchAll(PDO::FETCH_COLUMN);
    if (in_array('users', $tables)) {
        echo "The 'users' table exists!";
    } else {
        echo "The 'users' table does not exist!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
