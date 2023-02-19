<a href="index.html">
    <button>
        Back to Administration page
    </button>
</a>

<?php 
session_start();
include 'adminChk.php';
include 'conn.php'; //should use MySQL admin accout to access DB this is just DEMO 
$sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql);

?>
    <table>
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
        <th> <?php echo '' . $row['U_name'] ?> </th>
        <th> <?php echo '' . $row['U_mail'] ?> </th>
        <th> <?php echo '' . $row['U_type'] ?> </th>
        <th> <?php echo '' . $row['U_vid'] ?> </th>
        <th> <?php echo '' . $row['U_permit'] ?> </th>
        <th> <?php echo '' . $row['created_at'] ?> </th>
        <th> <a href=""> <button> Edit </button> </a> </th>
    </tr>
<?php } ?>
<!-- end while -->
</table>
    <?php
mysqli_close($conn);
?>


