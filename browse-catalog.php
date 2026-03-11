<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse catalog</title>
</head>
<body>
    <h1>Browse catalog</h1>
    <p>Here you can browse the catalog of available files.</p>
    <?php
    # List files in the "files" directory with download buttons
    $files = scandir('files');
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<p>$file <a href='files/$file' download>Download</a></p>";
        }
    }
    ?>
</body>
</html>