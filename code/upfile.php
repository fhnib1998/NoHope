<?php
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
    else {
        $image_name = $_FILES['file']['name'];
        $image_tmp = $_FILES['file']['tmp_name'];
        $image = "../uploads/".$image_name;
        move_uploaded_file($image_tmp,$image);
    }
?>