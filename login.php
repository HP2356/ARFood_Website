<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="server.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>

    <br>
    <a href="forgot-password.php">Forgot Password?</a>

    <br><br>
    <a href="register.php">Register</a>
</body>
</html>
