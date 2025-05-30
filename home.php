<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION["user_name"])) {
    header("Location: login.html");
    exit;
}

$user_name = $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        .top-right {
            position: absolute;
            top: 10px;
            right: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="top-right">
        👤 Logged in as: <?php echo htmlspecialchars($user_name); ?>
    </div>

    <h1>🎉 Welcome to the Home Page!</h1>
    <p>You have successfully logged in.</p>
</body>
</html>
