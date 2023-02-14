<?php
    require 'vendor/james-heinrich/getid3/getid3/getid3.php';
    include 'conn.php';
    session_start();

    $getID3 = new getID3;
    $file_name = $_FILES["video"]["name"];
    $file = $_FILES["video"]["tmp_name"];
    $fileInfo = $getID3->analyze($file);

    $U_ID = $_SESSION['U_ID'];

    $name = $_FILES['video']['name'];
    $size = $_FILES['video']['size'];

    $duration = $fileInfo['playtime_string']; //second
    // $min = $duration / 60; // minute
    // $sec = $duration % 60; // second
    // $length = $min . ':' . $sec;

    // echo "duration $duration <br>";
    // echo "min $min <br>";
    // echo "sec $sec <br>";
    // echo "length $length <br>";
    
    
    $file_ext = explode('.', $file_name); //use only file format
    $tmp_ext = explode('.', uniqid('', true) ); // use to gen random name
    $encode_name = implode('_', $tmp_ext);
    $file_new_name = implode('_', $tmp_ext) . '.' . end($file_ext);

    $sql = "INSERT INTO videos (V_title, V_view, V_length, V_size, U_ID, V_permit, V_encode)
    VALUES ('$name', 0, '$duration', '$size', '$U_ID', 'public', '$encode_name')";

    // echo "" . $file_name;
    // echo "" . $_POST['V_name'];
    // echo "" . $_POST['V_decs'];
    $upload_directory = "uploads/";
    // $upload_path = $upload_directory . basename($_FILES["video"]["name"]);
    
    // brgin upload and insert data to db
    $upload_path = $upload_directory . $file_new_name;
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $upload_path)) {
        // echo $file_new_name . "<br>";
        // echo "The video file ". basename( $_FILES["video"]["name"]). " has been uploaded.";
        if(mysqli_query($conn, $sql)) {
            header("Location: home.php");
            exit;
        }else {
            echo "insert db fail";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    
?>