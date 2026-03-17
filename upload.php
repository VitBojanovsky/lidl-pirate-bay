<?php
$target_dir = "files/";

$unallowed = ['php', 'html', 'htm', 'js', 'css', 'exe', 'sh', 'bat', 'cmd', 'com', 'vbs', 'vbe', 'wsf', 'wsh', 'ps1', 'ps2', 'psm1'];

$ext = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

if (in_array($ext, $unallowed)) {
    die("Nice try.");
}

$newName = bin2hex(random_bytes(16)) . "." . $ext;
$target_file = $target_dir . $newName;


if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Uploaded as " . htmlspecialchars($newName);
} else {
    echo "Upload failed.";
}
?>