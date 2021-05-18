<?php
session_start();
session_destroy();
header('location:login_users_only.php');
?>