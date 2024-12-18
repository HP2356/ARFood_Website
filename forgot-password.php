<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="server.php" method="POST">
        <label for="email">Enter your email to reset your password:</label>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit" name="forgot_password">Submit</button>
    </form>

    <br><br>
    <a href="login.php">Back to Login</a>
</body>
</html>
