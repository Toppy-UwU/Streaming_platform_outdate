<?php
    $server = "172.18.0.4:3306";
    $username = "root";
    $password = "passwd";
    $dbname = "streamDB";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    // if(!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";
?>