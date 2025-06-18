<?php
session_start();


if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

$galleryDir = "Gallery/";
$message = "";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
  $targetFile = $galleryDir . basename($_FILES["image"]["name"]);
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    $message = "Image uploaded successfully.";
  } else {
    $message = "Failed to upload image.";
  }
}


if (isset($_POST["delete"])) {
  $file = $_POST["delete"];
  if (file_exists($galleryDir . $file)) {
    unlink($galleryDir . $file);
    $message = "Image deleted.";
  }
}

$images = array_diff(scandir($galleryDir), ['.', '..']);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Manage Gallery</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    body {
      padding: 20px;
      font-family: sans-serif;
      background: #f5f5f5;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    img {
      width: 200px;
      height: auto;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Admin Panel - Art Gallery</h2>

    <?php if ($message): ?>
      <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Upload Image:</label>
        <input type="file" name="image" required class="form-control-file">
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <hr>

    <h4>Gallery Images</h4>
    <div class="row">
      <?php foreach ($images as $img): ?>
        <div class="col-md-3 text-center mb-4">
          <img src="Gallery/<?= htmlspecialchars($img) ?>" class="img-fluid">
          <form method="POST">
            <input type="hidden" name="delete" value="<?= htmlspecialchars($img) ?>">
            <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="return confirm('Delete this image?')">Delete</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>

    <a href="logout.php" class="btn btn-secondary mt-4">Logout</a>
  </div>
</body>
</html>
