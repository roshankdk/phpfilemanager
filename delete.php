<!-- delete.php -->
<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filepath = "uploads/" . $file;

    if (file_exists($filepath)) {
        unlink($filepath);
        echo "File deleted successfully.";
    } else {
        echo "File not found.";
    }
}

header('Location: index.php');
?>
