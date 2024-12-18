<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "<script>alert('Email already registered!');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "<script>alert('Registration successful! Please login.'); window.location.href='login_1.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Visual Palate</title>
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
        <div class="register-box">
            <h2>Register</h2>
            <form method="POST" action="register_1.php">
                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <label for="password">Re-enter Password:</label>
                <input type="password" name="repassword" required>

                <input type="submit" value="Register">
            </form>
            <p>Already have an account? <a href="login_1.php">Login</a></p>
        </div>
    </div>
</body>
</html>
