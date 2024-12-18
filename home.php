<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_1.php"); // Redirect to login page if not logged in
}

$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Visual Palate</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Visual Palate Logo" class="logo">
            <h1 class="website-name">Visual Palate</h1>
        </div>
    </header>

    <div class="home-container">
        <h2>Welcome, <?php echo htmlspecialchars($user_email); ?>!</h2>
        <p>Thank you for logging into Visual Palate. Enjoy your experience!</p>
    </div>
</body>
</html>
