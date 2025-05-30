<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home - Arombho</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .welcome {
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="header">
    <h2>Arombho</h2>
    <div class="welcome">
      <?php
      if (isset($_SESSION["user_name"])) {
          echo "👋 Welcome, <strong>" . htmlspecialchars($_SESSION["user_name"]) . "</strong>";
      } else {
          echo "<a href='login.html'>Login</a>";
      }
      ?>
    </div>
  </div>

  <hr>

  <!-- Your existing homepage content goes here -->
  <p>This is the home page content for your users.</p>

</body>
</html>
