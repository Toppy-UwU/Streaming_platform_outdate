<?php
session_start();
include 'conn.php';
include 'showVid.php';
$V_name = $_GET['Vid'];
$U_ID = $_SESSION['U_ID'];
$sql = "SELECT * FROM videos WHERE V_encode = '$V_name'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
$V_ID = $data['V_ID'];
$V_permit = $data['V_permit'];
$owner = $data['U_ID'];
if ($_SESSION['logged_in']) {
  $add_history = "INSERT INTO histories (U_ID, V_ID, H_watchtime) VALUES ($U_ID, $V_ID, 0)";
  mysqli_query($conn, $add_history);
}
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <title>Video</title>

  <style>
    #video {
      width: 100%;
      max-width: 1280px;
    }

    .test-bg {

      background-color: red;
    }

    .quality-select {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1;
      font-size: 16px;
      padding: 5px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      border: none;
      border-radius: 5px;
    }
  </style>

</head>

<body>

  <div class="d-flex" style="min-height: 100vh">
    <div class="position-fixed h-100" style="width: 250px; background-color: gray;">
      <div class="col-12">
        <div class="input-group" style="padding: 15px;">
          <input type="text" class="form-control rounded-end-0 rounded-start-pill" placeholder="search" aria-label="searchBar" aria-describedby="searchBtn">
          <div class="input-group-append">
            <button class="btn btn-light rounded-start-0 rounded-end-pill" type="button" id="searchBtn">search</button>
          </div>
        </div>

        <hr>

        <!-- menu start -->

        <div class="container-fluid vh-100 flex-column">
          <div class="row-cols-1 " style=" align-items: center;">
            <nav class="nav">
              <?php
              if ($_SESSION['logged_in']) {
              ?>
                <a href="home.php" style="margin-top: 20px;">
                  <button class="btn btn-light rounded-pill" style="width: 230px; color: black;">Home</button>
                </a>
                <a href="profile.php?profile=<?php echo $_SESSION['U_ID'] ?>" style="margin-top: 20px;">
                  <button class="btn btn-light rounded-pill" style="width: 230px; color: black;">Profile</button>
                </a>
                <a href="historyPage.php" style="margin-top: 20px;">
                  <button class="btn btn-light rounded-pill" style="width: 230px; color: black;">History</button>
                </a>

                <?php
                if ($_SESSION['type'] == 'admin') {
                ?>
                  <a href="adminPage.php" style="margin-top: 20px;">
                    <button class="btn btn-light rounded-pill" style="width: 230px; color: black;">Administration</button>
                  </a>
                <?php
                }
                ?>

                <a href="logout.php" style="margin-top: 20px;">
                  <button class="btn btn-danger rounded-pill" style="width: 230px; color: black;">Logout</button>
                </a>
              <?php
              } else {
              ?>
                <a href="login.php" style="margin-top: 20px;">
                  <button class="btn btn-light rounded-pill" style="width: 230px; color: black;">Login</button>
                </a>
              <?php
              }
              ?>





            </nav>
          </div>
        </div>

        <!-- end of menu -->

      </div>
    </div>

    <div class="container-fluid" style="margin-left: 250px; background-color: rgb(56, 56, 56);">
      <!-- content -->

      <?php if ($V_permit == 'private' and $owner == $U_ID) { ?>
        <div class="video-container test-bg">
          <video id="video" controls></video>
          <select id="quality-select" class="quality-select">
            <option value="auto" selected>Auto</option>
            <option value="240">240p</option>
            <option value="360">360p</option>
            <option value="480">480p</option>
            <option value="720">720p</option>
            <option value="1080">1080p</option>
          </select>

        </div>
        <h1> <?php echo '' . $data['V_title'] ?> </h1>
      <?php }
      if ($V_permit != 'private') { ?>
        <div class="video-container test-bg">
          <video id="video" controls></video>
          <select id="quality-select" class="quality-select">
            <option value="auto" selected>Auto</option>
            <option value="240">240p</option>
            <option value="360">360p</option>
            <option value="480">480p</option>
            <option value="720">720p</option>
            <option value="1080">1080p</option>
          </select>

        </div>
        <h1> <?php echo '' . $data['V_title'] ?> </h1>
        

      <?php } else {
        echo 'this video is private';
      } ?>
      <?php sh_vid() ?>
      <script src="//cdn.jsdelivr.net/npm/hls.js@latest"></script>

      <script>
        if (Hls.isSupported()) {
          console.log('hls.js work!!!');
        }
        var video = document.getElementById('video');
        var qualitySelect = document.getElementById('quality-select');
        var hls = new Hls();
        var url = 'http://localhost/python/HLS_file/<?php echo '' . $V_name ?>.m3u8';

        hls.loadSource(url);
        hls.attachMedia(video);
        qualitySelect.addEventListener('change', function() {
          var quality = qualitySelect.value;
          hls.levels.forEach(function(level, levelIndex) {
            if (level.height === quality || quality === 'auto') {
              hls.currentLevel = levelIndex;
            }
          });
        });

        // var time = localStorage.getItem('video-time-' + );
        
        var time = <?php echo '' . continue_time( $U_ID, $V_ID) ?>;
        if (time) {
          video.currentTime = time;
        }

        // video.addEventListener('timeupdate', function() {
        //   localStorage.setItem('video-time', video.currentTime);
        // });

        // Set the video's current time to the stored value when the video starts playing
        video.addEventListener('play', function() {
          var time = 0
          if (time) {
            video.currentTime = time;
          }
        });


        window.addEventListener('beforeunload', function() {
          var time = video.currentTime;
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'update.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              console.log(xhr.responseText); // Log the response from the server
            }
          }; 
          xhr.send('time=' + time + 
                   '&U_ID=' + <?php echo '' . $U_ID ?> + 
                   '&V_ID=' + <?php echo '' . $V_ID ?> + 
                   '&method=video-update-time');
        });
      </script>

    </div>

</body>

</html>