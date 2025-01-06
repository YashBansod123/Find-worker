<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect the mobile number from the form
    $mobile = htmlspecialchars($_POST['mobile']);

    // Basic validation
    if (empty($mobile)) {
        echo "Error: Mobile number is required.";
        exit();
    }

    if (!preg_match("/^[6-9]\d{9}$/", $mobile)) {
        echo "Error: Invalid mobile number. Please enter a valid 10-digit Indian mobile number.";
        exit();
    }

    // Simulate a login success (extend to real database logic later)
    echo "Login successful! Welcome to FindaWorker.";
} else {
    echo "Error: Invalid request.";
}
?>
