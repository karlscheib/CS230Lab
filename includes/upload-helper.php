<?php
require '../includes/dbhandler.php';
session_start();

define('KB', 1024);
define('MB', 1048576);

if (isset($_POST['prof-submit'])) {
    $username = $_SESSION['username'];
    $file = $_FILES['prof-image'];
    $file_name = $file['name'];
    $file_temp_name = $file['tmp_name'];

    $file_error = $file['error'];
    $file_size = $file['size'];

    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed = array('jpg','jpeg','png','svg');

    if($file_error != 0) {
        header("Location: ../profile.php?error=UploadError");
        exit();
    }
    if(!in_array($ext, $allowed)) {
        header("Location: ../profile.php?error=InvalidType");
        exit();
    }
    if($file_size > 4*MB) {
        header("Location: ../profile.php?error=FileSizeExcedeed");
        exit();
    }
    else {
        $new_name = uniqid('',true).".".$ext;

        $destination = "profiles/".$new_name;
        $sql = "UPDATE profiles SET profilepic='$destination' WHERE username='$username'";

        mysqli_query($conn, $sql);
        move_uploaded_file($file_temp_name, "../".$destination);
        header("Location: ../profile.php?success=UploadWin");
        exit();
    }


}
else {
    header("Loaction: ../profile.php");
    exit();


}

?>