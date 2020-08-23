<?php 
require_once "pdo.php";
session_start();
unset($_SESSION['p_name']);
unset($_SESSION['patient_id']);
header('Location: p_login.php');
