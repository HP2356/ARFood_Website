<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header('Location: home.php');
    } else {
        echo "<script>alert('Invalid email or password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Visual Palate</title>
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
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="login_1.php">
                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <p>Don't have an account? <a href="register_1.php">Register</a></p>
            <p><a href="forgot_password_1.php">Forgot Password?</a></p>
        </div>
    </div>
</body>
</html>
