<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000) {
                $fileNameNew = $id . "." . $fileActualExt;
                $fileDestination = "../img/photo" . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "picture is too big";
            }
        } else {
            echo "error uploading picture";
        }
    } else {
        echo " type incorrect";
    }
}
