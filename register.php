<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli("localhost", "root", "", "arombho");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST["user_id"] ?? '';
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $mobile = $_POST["mobile"] ?? '';
    $address = $_POST["address"] ?? '';
    $password_raw = $_POST["password"] ?? '';

    // No hashing!
    $stmt = $conn->prepare("INSERT INTO user (user_id, name, email, mobile, address, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $user_id, $name, $email, $mobile, $address, $password_raw);

    if ($stmt->execute()) {
        echo "✅ Registration successful. <a href='login.html'>Login now</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "⚠️ Invalid request.";
}
?>
