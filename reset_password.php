<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['token'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_GET['token'];

    if ($new_password === $confirm_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = :password, reset_token = NULL WHERE reset_token = :token");
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':token', $token);

        if ($stmt->execute()) {
            echo "Password successfully updated.";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>

<form method="POST" action="reset_password.php?token=<?php echo $_GET['token']; ?>">
    New Password: <input type="password" name="new_password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>
    <input type="submit" value="Reset Password">
</form>
