<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: ../dashboard.php");
exit;


session_start();
session_unset();
session_destroy();

header("Location: login.php");
?>