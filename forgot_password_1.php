<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Send password reset link (you can integrate actual mail functionality here)
        echo "<script>alert('Password reset link sent to your email.');</script>";
    } else {
        echo "<script>alert('Email not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Visual Palate</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Visual Palate Logo" class="logo">
            <h1 class="website-name">Visual Palate</h1>
        </div>
    </header>

    <div class="form-container">
        <div class="forgot-password-box">
            <h2>Forgot Password</h2>
            <form method="POST" action="forgot_password_1.php">
                <label for="email">Enter your email:</label>
                <input type="email" name="email" required>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
