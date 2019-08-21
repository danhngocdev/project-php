<?php 
// $id = isset($_GET['id']) ? $_GET['id'] :0;
if (isset($_GET['id'])) {
	$id = $_GET['id'];

}else{
$id = 0;
}
$sql = "DELETE FROM product WHERE id=$id";
$anh =  "DELETE FROM product_img WHERE pro_id=$id";
  mysqli_query($conn,$anh);
if (mysqli_query($conn,$sql)) {
	header('location: index.php?module=product');
	}else{
	echo 'Lỗi Không Xóa Được';
}

 ?>