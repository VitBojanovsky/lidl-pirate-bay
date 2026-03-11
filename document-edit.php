<!-- This file is an edited version from w3schools.com-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document editor</title>
</head>
<body>
    <h1>Document editor</h1>
    <p>Here you can edit the content of a document.</p>
    
    <?php
    $filename = '';
    $content = '';
    $fileExists = false;
    
    if (isset($_POST['filename']) && empty($_POST['content'])) {
        $filename = $_POST['filename'];
        $filepath = "files/$filename";
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (file_exists($filepath) && is_file($filepath) && $ext === 'txt') {
            $content = file_get_contents($filepath);
            $fileExists = true;
        }
    }
    elseif (isset($_POST['filename']) && isset($_POST['content'])) {
        $filename = $_POST['filename'];
        $content = $_POST['content'];
        file_put_contents("files/$filename", $content);
        echo "<p style='color: green;'>File '$filename' has been saved.</p>";
        $filename = '';
        $content = '';
    }
    ?>
    
    <?php if (empty($filename)): ?>
    <form method="post" action="document-edit.php">
        <label for="filename">Enter filename:</label><br>
        <input type="text" id="filename" name="filename" required><br>
        <input type="submit" value="Next">
    </form>
    <?php endif; ?>
    
    <?php if (!empty($filename)): ?>
    <form method="post" action="document-edit.php">
        <input type="hidden" name="filename" value="<?php echo htmlspecialchars($filename); ?>">
        <label for="content"><?php echo $fileExists ? 'Edit' : 'Create'; ?> Content:</label><br>
        <textarea id="content" name="content" rows="10" cols="50"><?php echo htmlspecialchars($content); ?></textarea><br>
        <input type="submit" value="Save">
        <input type="button" value="Back" onclick="location.href='document-edit.php'">
    </form>
    <?php endif; ?>
</body>
</html>