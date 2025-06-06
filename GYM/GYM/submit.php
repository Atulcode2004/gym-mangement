<?php
$host = "localhost";
$username = "root"; // change if using different DB credentials
$password = "";     // add your DB password
$database = "fitness_center";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$preferred_time = $_POST['time'];
$goals = $_POST['goals'];

// Insert into database
$sql = "INSERT INTO registrations (fullname, age, gender, contact, email, preferred_time, goals)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisssss", $fullname, $age, $gender, $contact, $email, $preferred_time, $goals);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
