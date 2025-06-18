

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

<?php
include "config.php";
$id = $_GET['id'];
$conn->query("DELETE FROM gallery WHERE id=$id");
header("Location: view-gallery.php");
?>