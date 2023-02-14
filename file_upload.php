<?php

if (isset($_FILES['video'])) {
    echo "start upload";
    $file = $_FILES['video'];

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // File extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('mp4', 'avi', 'mov');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 625000000) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'uploads/' . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo 'File uploaded successfully';
                }
            }
        }
    }
}
?>



<!-- echo "in ";

// if (isset($_FILES['video'])) {
    
// }

echo "start upload";
    $file = $_FILES['video'];

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // File extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('mp4', 'avi', 'mov');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 625000000) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'uploads/' . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo 'File uploaded successfully';
                }
            }
        }
    } -->
