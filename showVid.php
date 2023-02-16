<style>
    .limit-text {
        max-height: 2.4em;
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        font-size: large;
    }

    .no-line {
        text-decoration: none;
        color: white;
    }

    .sub-text {
        font-size: medium;

    }

    
    

</style>

<?php

function sh_vid()
{ //show only public video
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM videos WHERE V_permit = 'public'";
    $result = mysqli_query($conn, $sql);
?>
    <div class='container-fluid'>
        <div class='row'>
            <?php
            while ($row = $result->fetch_assoc()) {
                $Link = $row['V_encode'];
                $UID = $row['U_ID'];
                $sql2 = "SELECT U_name FROM users WHERE U_ID = '$UID'";
                $result2 = mysqli_query($conn, $sql2);
                $UserName = $result2->fetch_assoc();
            ?>
                <div class="col-3" style="padding: 5px;">
                    <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                    <div class="card" style="background-color: darkgray;">
                    <div class="card-title limit-text"><?php echo '' . $row['V_title']; ?></div>
                    <div class="card-subtitle sub-text"><?php echo '' . $row['V_length']; ?></div>
                    <div class="card-subtitle sub-text"><?php echo '' . $UserName['U_name']; ?></div>
                    </div>
                    </a>
                </div>
            <?php
                echo '<br>';
            }
            ?>
        </div>
    </div>
    <?php
    mysqli_close($conn);
}

function sh_user_vid($U_id)
{ // show user video
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM videos WHERE U_ID = '$U_id'";
    $result = mysqli_query($conn, $sql);
?>
    <div class='container-fluid'>
        <div class='row'>
            <?php
            while ($row = $result->fetch_assoc()) {
                $Link = $row['V_encode'];
                $UID = $row['U_ID'];
                $sql2 = "SELECT U_name FROM users WHERE U_ID = '$UID'";
                $result2 = mysqli_query($conn, $sql2);
                $UserName = $result2->fetch_assoc();
            ?>
                <div class="col-3" style="padding: 5px;">
                    <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                    <div class="card" style="background-color: darkgray;">
                    <div class="card-title limit-text"><?php echo '' . $row['V_title']; ?></div>
                    <div class="card-subtitle sub-text"><?php echo '' . $row['V_length']; ?></div>
                    <div class="card-subtitle sub-text"><?php echo '' . $UserName['U_name']; ?></div>
                    </div>
                    </a>
                </div>
            <?php
                echo '<br>';
            }
            ?>
        </div>
    </div>
    <?php
    mysqli_close($conn);
}

?>