<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
//     $file = $_FILES['photo'];
//     $uploadDir = 'photos/';  // Make sure this path is relative to your upload.php file

//     // Check if the file was uploaded without errors
//     if ($file['error'] == UPLOAD_ERR_OK) {
//         $tmpName = $file['tmp_name'];
//         $fileName = basename($file['name']);
//         $uploadPath = $uploadDir.$fileName;

//         // Attempt to move the uploaded file
//         if (move_uploaded_file($tmpName, $uploadPath)) {
//             echo "File uploaded successfully!";
//         } else {
//             echo "Error: Unable to move the uploaded file.";
//         }
//     } else {
//         echo "Error: File upload failed with error code " . $file['error'];
//     }
// }

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;
$auth = Auth::check();
$table = new UsersTable(new MySQL());
$name = $_FILES['photo']['name'];
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];
if($error) {
 HTTP::redirect("/profile.php", "error=file");
}
if($type === "image/jpeg" or $type === "image/png") {
 $table->updatePhoto($auth->id, $name);
 move_uploaded_file($tmp, "photos/$name");
 $auth->photo = $name;
 HTTP::redirect("/profile.php");
} else {
 HTTP::redirect("/profile.php", "error=type");
}