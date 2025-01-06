<?php
// db_connect.php file inclusion
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare the SELECT query to check if the username or email exists
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Username or email already exists!";
        } else {
            // If no existing user, insert the new user into the database
            $insert_query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $insert_stmt = $connection->prepare($insert_query);
            $insert_stmt->bindParam(':username', $username);
            $insert_stmt->bindParam(':email', $email);
            $insert_stmt->bindParam(':password', $hashed_password);
            
            if ($insert_stmt->execute()) {
                echo "<script>window.location.href = 'signup_success.php';</script>";

            } else {
                echo "Error: Could not create account.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
