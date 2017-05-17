<?php

// directory where files will be uploaded to
@$updir = "uploads/";
// file destination name
@$dest = $updir.basename($_FILES["photoUpload"]["name"]);

// make sure user clicked 'Upload'
if ( isset( $_POST['submit']) ) {
    // check if upload succeeded
    if (@$_FILES["photoUpload"]["error"] == UPLOAD_ERR_OK) {
        // verify that a photo was uploaded by file extension
        @$ext = strtolower(pathinfo($_FILES["photoUpload"]["name"], PATHINFO_EXTENSION));
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'png':
            case 'bmp':
                break; // file type is a photo
            default:
                echo "The file is not an acceptable file type<br>";
        }
    }

// move uploaded file to destination directory
    @$move = move_uploaded_file($_FILES["photoUpload"]["tmp_name"], $dest);
    if ($move === FALSE) {
        echo "Unable to move photo to directory<br>";
    } else {
        echo "<p style='margin: auto'>Photo moved successfully</p>";
    }
};
