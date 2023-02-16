<?php
session_start();
include 'conn.php';
$V_name = $_GET['Vid'];
$sql = "SELECT * FROM videos WHERE V_encode = '$V_name'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    var time = localStorage.getItem('video-time');
    if (time) {
      video.currentTime = time;
    }
    video.addEventListener('timeupdate', function() {
      localStorage.setItem('video-time', video.currentTime);
    });
  </script>


</body>

</html>