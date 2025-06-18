<?php
include "admin/config.php";

$result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");

$base_url = "https://databases hai /upload/"; 

echo "<h2>🎨 Art Gallery</h2><div style='display:flex; flex-wrap:wrap; gap:15px'>";
while ($row = $result->fetch_assoc()) {
    $imgUrl = $base_url . $row['image'];
    echo "<div style='border:1px solid #ccc; padding:10px;'>
            <img src='{$imgUrl}' width='200'><br>
            <p>{$row['title']}</p>
          </div>";
}
echo "</div>";
?>

