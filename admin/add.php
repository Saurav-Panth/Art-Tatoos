

<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] !== 'admin') {
    echo "<h3 style='color:red;'>Access denied. Admins only.</h3>";
    exit;
}
?>

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
    <title>Add Image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>➕ Add New Image</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required><br><br>
        <button type="submit" class="button">Upload</button>
    </form>
    <br><a href="view-gallery.php" class="button">Back to Gallery</a>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imgName = basename($_FILES["image"]["name"]);
    $target = "upload/" . $imgName;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        $conn->query("INSERT INTO gallery (image) VALUES ('$imgName')");
        echo "<p style='color:lightgreen;'>Image uploaded successfully!</p>";
    } else {
        echo "<p style='color:red;'>Upload failed!</p>";
    }
}
?>
</body>
</html>