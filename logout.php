<?php
include 'conn.php';
include 'log.php';

session_start();
log_in_out('logout', $conn);
session_destroy();
header("Location: login.php")

?>