<?php
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

if ($error) {
    header('Location: ../profile.php?error=file');
    exit();
}

if ($type === "image/jpeg" or $type === "image/png") {
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/project/_actions/photos/profile.jpg";
    if (move_uploaded_file($tmp, $targetPath)) {
        header('Location: ../profile.php');
    } else {
        echo "Error: Unable to move uploaded file.";
    }
} else {
    header('Location: ../profile.php?error=type');
}
?>
