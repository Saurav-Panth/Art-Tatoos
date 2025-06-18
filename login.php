<?php
session_start();

$admin_user = "admin";
$admin_pass = "lol";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    body {
      background: #f0f0f0;
      font-family: sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: #fff;
      padding: 30px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      border-radius: 8px;
      width: 300px;
    }
    .login-box h2 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" class="form-control" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control" required />
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
  </div>
</body>
</html>
