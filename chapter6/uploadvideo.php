<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
</head>
<body>
    <h1>Upload a Video</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="video">Select a video file:</label>
        <input type="file" name="video" id="video" accept="video/*">
        <input type="submit" name="submit" value="Upload Video">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $uploadDir = 'videos/'; // Directory where videos will be stored
        $videoName = uniqid() . '_' . $_FILES['video']['name']; // Generate a unique filename
        $targetFilePath = $uploadDir . $videoName;

        // Check if the file is a valid video
        $allowedTypes = ['video/mp4', 'video/mpeg', 'video/quicktime'];
        if (in_array($_FILES['video']['type'], $allowedTypes)) {
            if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFilePath)) {
                echo "Video uploaded successfully!";
            } else {
                echo "Error uploading the video.";
            }
        } else {
            echo "Invalid video format. Supported formats: MP4, MPEG, QuickTime.";
        }
    }
    ?>
</body>
</html>
