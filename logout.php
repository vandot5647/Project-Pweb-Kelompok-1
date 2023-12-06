<?php 
session_start();
session_destroy();
session_start();
$_SESSION['logout'] = 'Berhasil Logout';
header("Location: index.php");
?>