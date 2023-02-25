<?php
session_start();
if($_SESSION['type'] != 'admin') {
    header('Location: home.php');
    exit;
}
include 'adminChk.php';
include 'conn.php'; //should use MySQL admin accout to access DB this is just DEMO 
$sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql);

?>
<style>
    .radio-bg {
        background-color: white;
        border-radius: 15px;
        margin-left: 5px;
        margin-right: 5px;
    }
</style>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Mail</th>
        <th>Type</th>
        <th>Video Owned</th>
        <th>Upload Permit</th>
        <th>Create At</th>
        <th>Edit</th>
    </tr>

    <!-- start while -->
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <th> <?php echo '' . $row['U_ID'] ?> </th>
            <th> <a href="profile.php?profile=<?php echo '' . $row['U_ID'] ?>" style="text-decoration: none; color: rgb(21, 25, 29);"> <?php echo '' . $row['U_name'] ?> </a> </th>
            <th> <?php echo '' . $row['U_mail'] ?> </th>
            <th> <?php echo '' . $row['U_type'] ?> </th>
            <th> <?php echo '' . $row['U_vid'] ?> </th>
            <th> <?php if($row['U_permit'] == 1) echo 'Yes'; else echo 'No'; ?> </th>
            <th> <?php echo '' . $row['created_at'] ?> </th>
            <th> <button class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#editProfile-<?php echo '' . $row['U_ID'] ?>"> Edit </button> </th>
        </tr>

        <!-- edit profile popup -->

        <div class="modal fade" id="editProfile-<?php echo '' . $row['U_ID'] ?>" tabindex="-1" role="application" data-backdrop="false" aria-hidden="true" style="background-color: rgba(255, 255, 255, 0.307);">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: rgb(56, 56, 56);">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadVidTitle" style="color: white;">Edit <?php echo '' . $row['U_name'] ?> profile</h5>

                    </div>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- content -->
                            <input type="hidden" name="method" value="admin-update">
                            <input type="hidden" name="U_ID" value="<?php echo $row['U_ID'] ?>">
                            <div class="container-fluid">
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col">
                                        <input type="text" class="form-control" id="edit_name" name="U_name" value="<?php echo $row['U_name'] ?>">
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col">
                                        <input type="email" class="form-control" id="edit_mail" name="U_mail" value="<?php echo $row['U_mail'] ?>">
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col radio-bg">
                                        <label for="U_type"><h6>User Type</h6></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="U_type" id="edit_type_user" value="user" <?php echo ($row['U_type'] == 'user') ? 'checked' : ''; ?> >
                                            <label class="form-check-label" for="edit_type_user">
                                                User
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="U_type" id="edit_type_admin" value="admin" <?php echo ($row['U_type'] == 'admin') ? 'checked' : ''; ?> >
                                            <label class="form-check-label" for="edit_type_admin">
                                                Admin
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col radio-bg">
                                        <label for="U_permit"><h6>Upload Permission</h6></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="U_permit" id="edit_permit_yes" value="1" <?php echo ($row['U_permit'] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="edit_permit_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="U_permit" id="edit_permit_no" value="0" <?php echo ($row['U_permit'] == 0) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="edit_permit_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn btn-danger">Delete this user</button>
                                </div>

                            </div>

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
    <?php } ?>
    <!-- end while -->
</table>
<?php
mysqli_close($conn);
?>