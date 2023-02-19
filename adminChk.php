<?php
session_start();
if($_SESSION['type'] != 'admin') {
    header("Location: home.php");
}
?>