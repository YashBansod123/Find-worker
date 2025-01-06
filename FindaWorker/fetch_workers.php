<?php
// Include the database connection
include 'db_connect.php';

try {
    // Fetch all worker records
    $stmt = $connection->query("SELECT * FROM workers");
    $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return as JSON
    header('Content-Type: application/json');
    echo json_encode($workers);
} catch (PDOException $e) {
    echo "Error fetching workers: " . $e->getMessage();
}
?>
