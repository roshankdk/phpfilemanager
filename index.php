<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Management</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <h1>File Management System</h1>
    </header>

    <!-- Upload Form -->
    <section>
        <form action="upload_process.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select file to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" value="Upload File" name="submit">
        </form>
    </section>

    <!-- File List -->
    <h2>Uploaded Files</h2>
    <section>
        <?php
        // Define the directory path
        $directory = 'uploads/';

        // Check if the directory exists
        if (is_dir($directory)) {
            // Open the directory
            if ($dh = opendir($directory)) {
                echo '<ul>';
                // Read files and directories
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        echo '<li><a href="' . $directory . $file . '" target="_blank">' . htmlspecialchars($file) . '</a></li>';
                    }
                }
                echo '</ul>';
                // Close the directory
                closedir($dh);
            } else {
                echo '<p class="error">Unable to open directory.</p>';
            }
        } else {
            echo '<p class="error">Directory does not exist.</p>';
        }
        ?>
    </section>

</body>

</html>
