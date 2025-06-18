<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #1f1f1f, #ffcc70);
            font-family: 'Segoe UI', sans-serif;
        }

        .dashboard {
            max-width: 400px;
            margin: 100px auto;
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            background: #f8b500;
            color: #000;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            background: #f1a500;
        }

        .logout {
            background: #dc3545;
            color: #fff;
        }

        .logout:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome to Admin Panel</h2>
        <a href="upload.php">📤 Upload Picture</a>
        <a href="view-gallery.php">🖼️ View / Edit / Delete Gallery</a>
        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>
</body>
</html>
