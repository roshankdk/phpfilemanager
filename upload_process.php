<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file is uploaded correctly
if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
    echo "Upload error code: " . $_FILES['fileToUpload']['error'];
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Attempt to upload the file
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File was not uploaded due to earlier errors.";
}


// Redirect back to index.php after upload
// header('Location: index.php');
// exit();

?>
