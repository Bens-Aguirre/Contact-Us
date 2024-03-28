<?php
include "config.php";

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



// SQL query to insert data into the table
$sql = "INSERT INTO contact_message (name, email, message)
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 90vh;">';
echo '<div style="text-align: center;">';
echo '<p style="color: green; font-size: 30px;">Data Sent Successfully!</p>';
echo '<a href="table.php" style="text-decoration: none; color: #007BFF; font-size: 30px;">Go check the info here</a>';
echo '</div>';
echo '</div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>