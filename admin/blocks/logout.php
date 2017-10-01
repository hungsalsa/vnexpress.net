<?php 
ob_start();
session_start();
// print_r($_SESSION);
// die();
unset($_SESSION['idUser']);
unset($_SESSION['HoTen']);
unset($_SESSION['idGroup']);
header("location:../index.php");
?>