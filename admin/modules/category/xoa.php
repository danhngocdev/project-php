<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];	
}else{
	$id = 0;
}
$sql = "DELETE FROM category WHERE id = $id";
if (mysqli_query($conn,$sql)) {
	header('location: index.php?module=category');
	}else {
		echo 'Không cho phép xóa vui lòng thử lại';
	}

 ?>