<?php
    include 'conn.php';
    session_start();
    $method = $_POST['method'];

    if ($method == 'user-update') {
        $U_ID = $_SESSION['U_ID'];

        $U_name = $_POST['U_name'];
        $U_mail = $_POST['U_mail'];
        $U_pass = $_POST['U_pass']; // hash later


        $sql = "UPDATE users SET U_name = '$U_name', U_mail = '$U_mail', U_pass = '$U_pass' WHERE U_ID = '$U_ID'";
        if(mysqli_query($conn, $sql)) {
            header("Location: profile.php?profile=".$U_ID);
            exit;
            mysqli_close($conn);
        }
    }

    if ($method == 'admin-update') {
        $U_ID = $_POST['U_ID'];
        $U_name = $_POST['U_name'];
        $U_mail = $_POST['U_mail'];
        $U_type = $_POST['U_type'];
        $U_permit = $_POST['U_permit'];

        $update = "UPDATE users SET U_name = '$U_name', U_mail = '$U_mail', U_type = '$U_type', U_permit = '$U_permit' WHERE U_ID = '$U_ID'";
        if(mysqli_query($conn, $update)) {
            header("Location: adminPage.php");
            exit;
            mysqli_close($conn);
        }

    }

    if ($method == 'video-update-time') {
        $U_ID = $_POST['U_ID'];
        $V_ID = $_POST['V_ID'];
        $time = $_POST['time'];

        $update_time = "UPDATE histories SET H_watchtime = '$time' WHERE U_ID = '$U_ID' AND V_ID = '$V_ID' ORDER BY H_watchData DESC limit 1";
        mysqli_query($conn, $update_time);
    }

    else {
        header("Location: home.php");
        exit;
    }
    

?>