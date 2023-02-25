<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'conn.php';
include 'showVid.php';
$ID = $_GET['profile'];
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



    <title>Profile</title>

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
                                if ($_SESSION['upload_permit'] == '1') {
                                ?>
                                    <div style="margin-top: 20px;">
                                        <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#uploadVid" style="width: 230px; color: black;">Upload Video</button>
                                    </div>
                                <?php
                                }
                                ?>

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



                            <!-- upload popup -->
                            <div class="modal fade" id="uploadVid" tabindex="-1" role="application" data-backdrop="false" aria-hidden="true" style=" background-color: rgba(255, 255, 255, 0.307);">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content" style="background-color: rgb(56, 56, 56);">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="uploadVidTitle" style="color: white;">Upload Video</h5>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                                        </div>
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-7 rounded">
                                                            <div class="custom-file">
                                                                <input type="file" id="selectVid" class="form-control-file" name="video" accept="video/*">
                                                                <label class="custom-file-label" for="selectVid">Select File</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <label for="U_type">
                                                                <h6>Video permission</h6>
                                                            </label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="V_permit" id="permit_public" value="public" checked>
                                                                <label class="form-check-label" for="permit_public">
                                                                    Public
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="V_permit" id="permit_private" value="private">
                                                                <label class="form-check-label" for="permit_private">
                                                                    Private
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="V_permit" id="permit_unlist" value="unlisted">
                                                                <label class="form-check-label" for="permit_unlist">
                                                                    unlisted
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style=" padding: 5px;">
                                                        <input type="text" class="form-control rounded-pill" placeholder="title" name="V_title" style="height: 30px;">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Cancle</button>
                                                <button type="submit" class="btn btn-primary rounded-pill">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-left: 250px; background-color: rgb(56, 56, 56);">
            <div class="row" >
                <div class="row-cols-auto" style="background-image: url(pic/profile\ bg.jpg); height: fit-content;">
                    <!-- <h1>This is user profile page</h1> -->
                    <div class="row align-items-center" style="background-color: rgba(255, 255, 255, 0.4);">

                        <!-- <div class="col-3 text-center" style="background-color: red;">
                            <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                                <img src="pic/profile pic.jpg" alt="" style="height: auto; width: 100%;">
                            </div>
                        </div> -->

                        <div class="col-2 text-center d-flex justify-content-center align-items-center">
                            <div class="img-container" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin-top: 30px; margin-bottom: 20px;">
                                <img src="pic/profile pic.jpg" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="col-8">
                            <h3>
                                <?php
                                echo $data['U_name'];
                                ?>
                            </h3>
                            <h3>
                                <?php
                                echo $data['U_mail'];
                                ?>
                            </h3>
                            <h3>
                                Video Owned:
                                <?php
                                echo $data['U_vid'];
                                ?>
                            </h3>
                        </div>

                        <?php
                        if ($ID == $_SESSION['U_ID']) {
                        ?>
                            <div class="col-2">
                                <div class="row " style="height: fit-content;">
                                    <div class="col">
                                        <div class="div-center">
                                            <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#editProfile">
                                                edit profile
                                            </button>

                                            <!-- edit profile popup -->

                                            <div class="modal fade" id="editProfile" tabindex="-1" role="application" data-backdrop="false" aria-hidden="true" style="background-color: rgba(255, 255, 255, 0.307);">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" style="background-color: rgb(56, 56, 56);">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="uploadVidTitle" style="color: white;">Edit Profile</h5>

                                                        </div>
                                                        <form action="update.php" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <!-- content -->
                                                                <div style="margin-bottom: 10px;">
                                                                    <input type="text" class="form-control" id="edit_name" name="U_name" value="<?php echo $data['U_name'] ?>">
                                                                </div>
                                                                <div style="margin-bottom: 10px;">
                                                                    <input type="text" class="form-control" id="edit_mail" name="U_mail" value="<?php echo $data['U_mail'] ?>">
                                                                </div>
                                                                <div>
                                                                    <input type="text" class="form-control" id="edit_pass" name="U_pass" value="<?php echo $data['U_pass'] ?>">
                                                                </div>
                                                                <input type="hidden" name="method" value="user-update">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Cancle</button>
                                                                <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end of popup -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="row-cols-auto" style=" height: fit-content;">
                    <!-- user content -->

                    <div class="container mt-3">
                        <div class="text-left mt-3">
                            <button id="btn1" class="btn btn-light " onclick="showPanel('pnl1')">Public Video</button>
                            <?php if($ID == $_SESSION['U_ID']) { ?>
                                <button id="btn2" class="btn btn-light " onclick="showPanel('pnl2')">Private Video</button>
                                <button id="btn3" class="btn btn-light " onclick="showPanel('pnl3')">Unlisted Video</button>
                                <button id="btn4" class="btn btn-light " onclick="showPanel('pnl4')">User Log</button>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pnl1">
                                    <h3>
                                    <?php 
                                        sh_user_vid($ID);
                                    ?>
                                    </h3>
                                </div>

                                <div id="pnl2" class="d-none">
                                    <h3>
                                    <?php 
                                        sh_user_private($ID);
                                    ?>
                                    </h3>
                                </div>

                                <div id="pnl3" class="d-none">
                                    <h3>
                                    <?php 
                                        sh_user_unlisted($ID);
                                    ?>
                                    </h3>
                                </div>

                                <div id="pnl4" class="card d-none">
                                    <div class="card-header">
                                        User Log Data
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        include 'log.php';
                                        include 'conn.php';
                                        showUserLog($conn);
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
                            $('#pnl1, #pnl2, #pnl3, #pnl4').addClass('d-none');
                            // Show the selected panel
                            $('#' + pnlId).removeClass('d-none');
                        }
                    </script>

                    <!-- emd of user content -->
                </div>
            </div>
        </div>
    </div>


</body>

</html>