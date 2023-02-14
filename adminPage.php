<?php
session_start();
if($_SESSION['type'] != 'admin'){
    echo "You are not admin!!!!";
}else {
    echo "this is admin page";
}