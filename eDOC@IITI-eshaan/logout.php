<?php
session_start();
unset($_SESSION['a_name']);
unset($_SESSION['admin_id']);
session_destroy();

header("Location: admin_login.php");
exit;
?>