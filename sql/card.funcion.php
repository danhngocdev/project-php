<?php 
 function tong_so_luong(){
 	$tong = 0;
 	$gio_hang = isset($_SESSION['gio-hang']) ? $_SESSION['gio-hang'] : [];
 	foreach ($gio_hang as $gh) {
     $tong =  $tong + $gh['quantity'];
 	}
   return $tong;
}
// Tổng Tiền
function tongtien(){
 	$tong_tien = 0;
 	$gio_hang = isset($_SESSION['gio-hang']) ? $_SESSION['gio-hang'] : [];
 	foreach ($gio_hang as $gh) {
     $tong_tien =  $tong_tien + $gh['quantity'] * $gh['price'];
 	}
   return $tong_tien;
}
 ?>