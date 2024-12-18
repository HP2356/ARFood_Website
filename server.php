<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling user login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to get user by email
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // "s" indicates the variable is a string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password (hashed)
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "No user found with that email.";
    }
}

// Handling user registration
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reenter_password = $_POST['reenter_password'];

    // Check if passwords match
    if ($password !== $reenter_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL to prevent SQL injection
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password); // "ss" means two string parameters

        if ($stmt->execute()) {
            echo "Registration successful!";
            // Optionally, you can redirect the user after registration
            // header("Location: login.php?status=success");
            // exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Handling forgot password
if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];

    // You can implement the password reset logic here (sending a reset link via email)
    echo "Password reset link has been sent to your email.";
}

$conn->close();
?>
