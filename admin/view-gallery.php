
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>🖼️ Your Gallery</h1>
    <div class="gallery">
        <?php
        $result = $conn->query("SELECT * FROM gallery");
        while($row = $result->fetch_assoc()) {
            echo "<div class='gallery-item'>";
            echo "<img src='upload/{$row['image']}' />";
            echo "<div class='controls'>
                    <a href='edit.php?id={$row['id']}'>✏️ Edit</a>
                    <a href='delete.php?id={$row['id']}'>🗑️ Delete</a>
                  </div>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>