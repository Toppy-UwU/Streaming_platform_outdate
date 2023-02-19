<?php
function sh_all_histories() {
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM histories";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        echo '<br>ID:' . $row['H_ID'];
        echo '  User:' . $row['U_ID'];
        echo '  Video:' . $row['V_ID'];
        echo '  date:' . $row['H_watchData'];

    }
}


function sh_user_histories($ID) {
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM histories WHERE U_ID = '$ID'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        echo '<br>ID:' . $row['H_ID'];
        echo '  User:' . $row['U_ID'];
        echo '  Video:' . $row['V_ID'];
        echo '  date:' . $row['H_watchData'];
    }
}
?>