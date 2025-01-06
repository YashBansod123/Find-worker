<?php
include 'db_connect.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $experience = $_POST['experience'];
    $hourly_rate = $_POST['hourly_rate'];

    try {
        // Validate inputs
        if (empty($name) || empty($category) || empty($location) || empty($email) || empty($contact_number)) {
            throw new Exception("All fields are required.");
        }

        // Check for duplicate email
        $stmt = $connection->prepare("SELECT * FROM workers WHERE email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->rowCount() > 0) {
            throw new Exception("Email already registered.");
        }

        // Insert into the database
        $stmt = $connection->prepare("INSERT INTO workers (name, category, location, email, contact_number, experience, hourly_rate) 
                                     VALUES (:name, :category, :location, :email, :contact_number, :experience, :hourly_rate)");

        $stmt->execute([
            'name' => $name,
            'category' => $category,
            'location' => $location,
            'email' => $email,
            'contact_number' => $contact_number,
            'experience' => $experience,
            'hourly_rate' => $hourly_rate
        ]);

        echo "<h2>Worker Registered Successfully!</h2>";
        echo "<p>Go back to the <a href='workers.html'>Worker Listings</a></p>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
