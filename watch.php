<?php
    session_start();
    $V_name = $_GET['Vid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
</head>
<body>
    <h1> <?php echo ''. $V_name ?> </h1>

    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<video id="video"></video>
<script>
  var video = document.getElementById('video');
  if(Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource('http://localhost/python/HLS_file/<?php echo ''. $V_name ?>.m3u8');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
 // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
 // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
 // This is using the built-in support of the plain video element, without using hls.js.
  else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = 'http://localhost/python/HLS_file/<?php echo ''. $V_name ?>.m3u8';
    video.addEventListener('canplay',function() {
      video.play();
    });
  }
</script>
    

</body>
</html>