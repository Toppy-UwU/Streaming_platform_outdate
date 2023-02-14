<!-- <!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<h1>Registration</h1>
	<form action="regis.php" method="post">
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email"><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Submit">
	</form> 
</body>
</html> -->


<!doctype html>
<?php
session_start();
if($_SESSION['logged_in']) {
  header("Location: home.php");
}
?>
<html>

<head>
  <title>Registration</title>
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
			  <h4 style="color: white; text-align: center;"> Registration</h4>
              <br>
              <form action="regis.php" method="post">
                <div class="form-group" style="margin-top: 10px; margin-bottom: 20px;">
                  <input type="text" class="form-control rounded-pill" name="name" id="name"
                    placeholder="User name">
                </div>
				<div class="form-group" style="margin-top: 10px; margin-bottom: 20px;">
					<input type="email" class="form-control rounded-pill" name="email" id="email"
					  placeholder="Email">
				</div>
                <div class="form-group" style="margin-top: 20px; margin-bottom: 10px;">
                  <input type="password" class="form-control rounded-pill" name="password" id="passwoed"
                    placeholder="Password">
                </div>
				<div class="form-group" style="margin-top: 20px; margin-bottom: 10px;">
					<input type="password" class="form-control rounded-pill" name="con_password" id="con_passwoed"
					  placeholder="Password">
				  </div>
                <br><br>
                <div class="div-center">
                  <button type="submit" class="btn btn-primary rounded-pill" style="width: 150px;">Register</button>
                </div>
              </form>
              <div class="div-center">
                <a href="login.php">
                  <button class="btn btn-danger rounded-pill" style="margin-top: 10px; width: 100px;">Cancle</button>
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