<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = sha1($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h1>🔐 Admin Login</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" class="button">Login</button>
    </form>
</div>
</body>
</html>