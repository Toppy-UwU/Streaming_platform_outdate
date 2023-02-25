<?php

// store login logout log
function log_in_out($log, $conn)
{
    session_start();
    $U_ID = $_SESSION['U_ID'];
    $U_name = $_SESSION['U_name'];

    $sql = "INSERT INTO login_logs (U_id, username, action) 
    VALUE ('$U_ID', '$U_name', '$log')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function showLog($conn)
{
    session_start();
    $U_ID = $_SESSION['U_ID'];
    if ($_SESSION['type'] == 'admin') {
        $sql = "SELECT * FROM login_logs";
    } elseif ($_SESSION['type'] == 'user') {
        $sql = "SELECT * FROM login_logs WHERE U_id = '$U_ID'";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Action</th>
                <th>Timestamp</th>
            </tr>


            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <!-- echo "id: " . $row["U_id"]. " - Name: " . $row["username"]. " - Action:" . $row["action"]. " - Timestamp:" . $row["timestamp"]."<br>"; -->
                <tr>
                    <th> <?php echo '' . $row['U_id'] ?> </th>
                    <th> <?php echo '' . $row['username'] ?> </th>
                    <th> <?php echo '' . $row['action'] ?> </th>
                    <th> <?php echo '' . $row['timestamp'] ?> </th>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
    } else {
        echo "0 results";
    }
}


?>