<!DOCTYPE html>
<html lang="en">
<?php
session_start();
// if (!$_SESSION['logged_in']) {
//     header("Location: login.php");
// }
include 'conn.php';
include 'showVid.php';
$ID = $_SESSION['U_ID'];
$sql = "SELECT * FROM users WHERE U_ID = '$ID'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
mysqli_close($conn);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=divice-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



    <title>Home</title>

    <style>
        .div-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <h1>this is user page</h1>

    <div>
        <h1>
            Upload
        </h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="video" accept="video/*">
            <input type="submit" value="Upload">
        </form>
        <a href="video.html">
            <button>
                video
            </button>
        </a>

    </div> -->

    <!-- start of side bar -->

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

        <!-- end of side bar -->

        <div class="container-fluid" style="margin-left: 250px; background-color: rgb(56, 56, 56);">
            <div class="container mt-3">
                <div class="text-left mt-3">
                    <button id="btn1" class="btn btn-light " onclick="showPanel('pnl1')">User List</button>
                    <button id="btn2" class="btn btn-light " onclick="showPanel('pnl2')">Log</button>
                    <button id="btn3" class="btn btn-light " onclick="showPanel('pnl3')">Server resource</button>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div id="pnl1" class="card">
                            <div class="card-header">
                                User List
                            </div>
                            <div class="card-body">
                                <?php
                                include 'userList.php';
                                ?>
                            </div>
                        </div>

                        <div id="pnl2" class="card d-none">
                            <div class="card-header">
                                Log Data
                            </div>
                            <div class="card-body">
                                <?php
                                include 'log.php';
                                include 'conn.php';
                                showLog($conn);
                                ?>
                            </div>
                        </div>

                        <div id="pnl3" class="card d-none">
                            <div class="card-header">
                                server resource
                            </div>
                            <div class="card-body">
                                <?php
                                    include 'serverMonitor.php';
                                    get_server_resource();
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- Include Bootstrap JS and jQuery -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

            <script>
                // Function to show selected panel
                function showPanel(pnlId) {
                    // Hide both panels
                    $('#pnl1, #pnl2, #pnl3').addClass('d-none');
                    // Show the selected panel
                    $('#' + pnlId).removeClass('d-none');
                }
            </script>
        </div>
    
    </div>


</body>

</html>