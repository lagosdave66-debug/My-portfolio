<?php
// Database configuration
$host = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "portfolio_db";

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capturing your specific sample data
    $fullName = mysqli_real_escape_string($conn, $_POST['name']);  // Stores: Ogbor David Friday
    $email    = mysqli_real_escape_string($conn, $_POST['email']); // Stores: ogbordavid214@gmail.com
    $msg      = mysqli_real_escape_string($conn, $_POST['message']);

    // SQL query to insert the data
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$fullName', '$email', '$msg')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Success!</h2>";
        echo "Message received from: <strong>" . $fullName . "</strong><br>";
        echo "We will reply to: <strong>" . $email . "</strong>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>