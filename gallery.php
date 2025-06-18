<?php
include "admin/config.php"; // Use same DB config

$result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");

echo "<h2>🎨 Art Gallery</h2><div style='display:flex; flex-wrap:wrap; gap:15px'>";
while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; padding:10px;'>
            <img src='admin/upload/{$row['image']}' width='200'><br>
            <p>{$row['title']}</p>
          </div>";
}
echo "</div>";
?>
