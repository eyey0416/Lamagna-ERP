<?php
// Connect to your database
$servername = "http://localhost/phpmyadmin/";
$username = "C:/xampp/apache";
$password = "";
$database = "user input"; // Change this to your actual database name
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO users (name, birthday, gender, email, phone, address) VALUES ('$name', '$birthday', '$gender', '$email', '$phone', '$address')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
