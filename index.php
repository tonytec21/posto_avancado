<?php 
session_start();
if(!isset($_SESSION['id'])) {header('location:login.php');};
if(!empty($_SESSION['id'])) {header('location:index/index.php');};

?>
