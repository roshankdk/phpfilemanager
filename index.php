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

    <!-- Display Messages -->
    <section>
        <?php
        session_start(); // Start the session

        // Display success or error messages
        if (isset($_SESSION['message'])) {
            echo '<p class="success">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }

        if (isset($_SESSION['error'])) {
            echo '<p class="error">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
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
                        echo '<li>';
                        echo '<a href="' . $directory . $file . '" target="_blank">' . htmlspecialchars($file) . '</a>';
                        echo '<form action="delete.php" method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="fileToDelete" value='. htmlspecialchars(urlencode($file)) . '>';
                        echo '<input type="submit" value="Delete" class="delete-button">';
                        echo '</form>';
                        echo '</li>';
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
