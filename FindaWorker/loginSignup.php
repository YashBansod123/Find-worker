<?php
session_start(); // Start session for user management
include 'db_connect.php'; // Include database connection file

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch user inputs from the form
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input fields
    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required. Please fill out the form correctly.'); window.history.back();</script>";
        exit;
    }

    try {
        // Prepare query to fetch user data
        $query = "SELECT * FROM users WHERE username = :username AND email = :email";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to welcome page after successful login
            // After successful login in loginSignup.php
            header("Location: dashboard.php");
            exit();

        } else {
            // If credentials are incorrect
            echo "<script>alert('Invalid username, email, or password. Please try again.'); window.history.back();</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(199, 138, 138);
            margin: 0;
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>You have successfully logged in to FindaWorker.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
