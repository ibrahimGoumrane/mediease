<?php 
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../view/login.php");
    exit();
}