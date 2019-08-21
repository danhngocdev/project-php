<?php 
 $id = isset($_GET['id']) ? $_GET['id'] : 0;
 $sql = "DELETE FROM customer WHERE id = $id";
 if (mysqli_query($conn,$sql)) {
 	header('location: index.php?module=thanhvien');
 }else {
 	echo 'Lỗi Không Xóa Được Vui Lòng Thử Lại';
 }


 ?>