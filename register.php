<?php
// server.php (example implementation)
// After registration is successful, redirect to the login page with a success query parameter
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Simulate registration logic, like saving user data to the database
    // Example: If registration is successful
    header("Location: login.php?status=success");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Visual Palate</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Header with logo and website name -->
    <header>
        <div class="logo-container">
            <img src="logo.png" alt="Visual Palate Logo" class="logo">
            <h1>Visual Palate</h1>
        </div>
    </header>

    <!-- Registration Form Section -->
    <div class="form-container">
        <h2>Create Your Account</h2>
        <form action="register.php" method="POST" class="form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <label for="reenter_password">Re-enter Password:</label>
            <input type="password" name="reenter_password" id="reenter_password" placeholder="Re-enter your password" required>

            <button type="submit" name="register">Register</button>
        </form>

        <!-- Link for login -->
        <div class="links">
            <span>Already have an account? </span><a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>
