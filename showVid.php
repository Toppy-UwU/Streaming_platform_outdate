<style>
    .limit-text {
        max-height: 2.5em;
        height: 5em;
        overflow: hidden;
        white-space: normal;
        text-overflow: ellipsis;
        font-size: medium;
    }

    .no-line {
        text-decoration: none;
        color: white;
    }

    .sub-text {
        font-size: medium;

    }

    .video-card {
        background-color: darkgray;
        border-radius: 15px;
        height: 200px;
        font-size: large;
    }

    .col-card {
        padding: 20px; 
        padding-bottom: 0px;
        transition: 0.5s;
    }

    .col-card:hover {
        padding: 15px; 
        padding-bottom: 0px;
        transition: 0.5s;
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
                <div class="col-3" style="padding: 20px; padding-bottom: 0px;">


                    <div class="row video-card">
                        <!-- <img src="pic\bg.jpg" alt="bg"> -->
                        <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                            <div class="col">
                                <div class="row" style="background-image: url(pic/bg.jpg); height: 130px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                </div>
                                <!-- <div class="row" style="max-height: 6em;">
                                    <img src="pic\bg.jpg" alt="bg">
                                </div> -->
                                <div class="row">
                                    <div class="col-9 limit-text"><?php echo '' . $row['V_title']; ?></div>
                                    <div class="col-3"><?php echo '' . $row['V_length']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php echo '' . $UserName['U_name']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


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
    $sql = "SELECT * FROM videos WHERE U_ID = '$U_id' AND V_permit = 'public'";
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
                <div class="col-3" style="padding: 20px; padding-bottom: 0px;">


                    <div class="row video-card">
                        <!-- <img src="pic\bg.jpg" alt="bg"> -->
                        <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                            <div class="col">
                                <div class="row" style="background-image: url(pic/bg.jpg); height: 130px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                </div>
                                <!-- <div class="row" style="max-height: 6em;">
                                    <img src="pic\bg.jpg" alt="bg">
                                </div> -->
                                <div class="row">
                                    <div class="col-9 limit-text"><?php echo '' . $row['V_title']; ?></div>
                                    <div class="col-3"><?php echo '' . $row['V_length']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php echo '' . $UserName['U_name']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


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

function sh_user_private($U_id)
{ // show user private video
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM videos WHERE U_ID = '$U_id' AND V_permit = 'private'";
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
                <div class="col-3" style="padding: 20px; padding-bottom: 0px;">


                    <div class="row video-card">
                        <!-- <img src="pic\bg.jpg" alt="bg"> -->
                        <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                            <div class="col">
                                <div class="row" style="background-image: url(pic/bg.jpg); height: 130px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                </div>
                                <!-- <div class="row" style="max-height: 6em;">
                                    <img src="pic\bg.jpg" alt="bg">
                                </div> -->
                                <div class="row">
                                    <div class="col-9 limit-text"><?php echo '' . $row['V_title']; ?></div>
                                    <div class="col-3"><?php echo '' . $row['V_length']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php echo '' . $UserName['U_name']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


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

function sh_user_unlisted($U_id)
{ // show user unlisted video
    include 'conn.php';
    session_start();
    $sql = "SELECT * FROM videos WHERE U_ID = '$U_id' AND V_permit = 'unlisted'";
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
                <div class="col-3" style="padding: 20px; padding-bottom: 0px;">


                    <div class="row video-card">
                        <!-- <img src="pic\bg.jpg" alt="bg"> -->
                        <a href="watch.php?Vid=<?php echo '' . $Link ?>" class="no-line">
                            <div class="col">
                                <div class="row" style="background-image: url(pic/bg.jpg); height: 130px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                </div>
                                <!-- <div class="row" style="max-height: 6em;">
                                    <img src="pic\bg.jpg" alt="bg">
                                </div> -->
                                <div class="row">
                                    <div class="col-9 limit-text"><?php echo '' . $row['V_title']; ?></div>
                                    <div class="col-3"><?php echo '' . $row['V_length']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php echo '' . $UserName['U_name']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


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

function test_text($in_text)
{
    echo 'this is input text' . $in_text;
    echo '<br>this is test text';
}

?>