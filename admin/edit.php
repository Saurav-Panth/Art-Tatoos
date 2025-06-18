
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include "config.php"; $id = $_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>✏️ Update Image</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required><br><br>
        <button type="submit" class="button">Update</button>
    </form>
    <br><a href="view-gallery.php" class="button">Back to Gallery</a>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imgName = basename($_FILES["image"]["name"]);
    $target = "upload/" . $imgName;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        $conn->query("UPDATE gallery SET image='$imgName' WHERE id=$id");
        echo "<p style='color:lightgreen;'>Image updated!</p>";
    } else {
        echo "<p style='color:red;'>Update failed!</p>";
    }
}
?>
</body>
</html>