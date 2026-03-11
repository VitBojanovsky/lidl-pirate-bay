<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Document editor</h1>
    <p>Here you can edit the content of a document.</p>
    <?php
    echo "enter the name of the file you want to edit, if it soes not exist, it will be created";
    ?>
    <form method="post" action="document-edit.php">
        <label for="filename">Filename:</label><br>
        <input type="text" id="filename" name="filename"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="10" cols="50"></textarea><br>
        <input type="submit" value="Save">
    </form>
    <?php
    if (isset($_POST['filename']) && isset($_POST['content'])) {
        $filename = $_POST['filename'];
        $content = $_POST['content'];
        file_put_contents("files/$filename", $content);
        echo "File '$filename' has been saved.";
    }
    
    ?>
</body>
</html>