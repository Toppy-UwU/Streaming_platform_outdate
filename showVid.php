<?php

    function sh_vid() { //show only public video
        include 'conn.php';
        session_start();
        $sql = "SELECT * FROM videos WHERE V_permit = 'public'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            $Link = $row['V_encode'];
            ?>
            <a href="watch.php?Vid=<?php echo ''. $Link ?>">
            <?php
            echo '' . $row['V_title'];
            ?>
            </a>
            <?php
            echo '<br>';
        }
        mysqli_close($conn);
    }

    function sh_user_vid($U_id) { // show user video
        include 'conn.php';
        session_start();
        $sql = "SELECT * FROM videos WHERE U_ID = '$U_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            $Link = $row['V_encode'];
            ?>
            <a href="watch.php?Vid=<?php echo ''. $Link ?>">
            <?php
            echo '' . $row['V_title'];
            ?>
            </a>
            <?php
            echo '<br>';
        }
        mysqli_close($conn);
    }
    
?>
