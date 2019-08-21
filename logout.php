<?php session_start(); 
 
if (isset($_SESSION['name'])){
    unset($_SESSION['name']);
    unset($_SESSION['gio-hang']); // xóa session login
}

header('location: index.php');
?>
