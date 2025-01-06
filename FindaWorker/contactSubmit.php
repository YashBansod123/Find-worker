<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic Validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Error: All fields are required.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email address.";
        exit();
    }

    // Simulate Success (extend to save data or send email)
    echo "Thank you, $name! Your message has been received.";
} else {
    echo "Error: Invalid request method.";
}
?>
