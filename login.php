<!doctype html>
<?php
session_start();
if($_SESSION['logged_in']) {
  header("Location: home.php");
}
?>
<html>

<head>
  <title>Streaming Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <style>
    .my-center {
      margin-top: auto;
      margin-bottom: auto;
    }

    .div-center {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .space {
      padding-top: 10px;
      padding-left: 10px;
      padding-bottom: 10px;
      padding-right: 10px;
    }
  </style>


</head>

<body style="background-image: url(pic/bg.jpg); background-size: cover;">

  <div style="background-color: rgba(38, 38, 38, 0.85); background-size: cover;">
    <div class="container">
      <div class="row vh-100">
        <div class="col-12 my-center">
          <div class="card mx-auto rounded" style="width: 300px; background-color: rgb(55, 55, 55);">
            <div class="card-body">
              <h2 style="color: white; text-align: center;"> CS Streaming</h2>
              <h4 style="color: white; text-align: center;"> Login</h4>
              <br>
              <form action="loginCheck.php" method="post">
                <div class="form-group" style="margin-top: 10px; margin-bottom: 20px;">
                  <input type="email" class="form-control rounded-pill" name="email" id="email"
                    placeholder="Email">
                </div>
                <div class="form-group" style="margin-top: 20px; margin-bottom: 10px;">
                  <input type="password" class="form-control rounded-pill" name="password" id="passwoed"
                    placeholder="Password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" id="RemMe" for="exampleCheck1" style="color: white;">Remember Me</label>
                </div>
                <br><br>
                <div class="div-center">
                  <button type="submit" class="btn btn-primary rounded-pill" style="width: 150px;">Login</button>
                </div>
              </form>
              <div class="div-center">
                <a href="register.php">
                  <button class="btn btn-success rounded-pill" style="margin-top: 10px; width: 100px;">Register</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </div>


</body>

</html>