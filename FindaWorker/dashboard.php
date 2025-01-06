<?php
// dashboard.php
session_start();

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: loginSignup.html");
    exit();
}

// Fetch the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - FindaWorker</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        header h1 {
            margin: 0;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .logout-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to FindaWorker Dashboard</h1>
    </header>

    <!-- Content Section -->
    <div class="container">
        <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Welcome to your dashboard. What would you like to do next?</p>
        <ul>
            <li><a href="editProfile.php">Edit Your Profile</a></li>
            <li><a href="index.html">Search for Workers</a></li>
        </ul>

        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
