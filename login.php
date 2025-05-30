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
    $password_input = $_POST["password"] ?? '';

    $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Plain password check
        if ($password_input === $user["password"]) {
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_id"] = $user["user_id"];
            header("Location: index.html");
            exit;
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ User ID not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "⚠️ Invalid request.";
}
?>
