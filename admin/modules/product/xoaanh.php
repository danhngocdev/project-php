<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$pro_id = isset($_GET['pro_id']) ? $_GET['pro_id'] : 0;

// if (isset($_GET['id'])) {
// 	$id = $_GET['id'];
// }else{
// 	$id = 0;
// }
$sql = mysqli_query($conn,"SELECT * FROM product WHERE id = $id ");



$anh =  "DELETE FROM pro_img WHERE id=$id";
 $a = mysqli_fetch_assoc($sql);
 $b =$a['id'];
 
if(mysqli_query($conn,$anh)){
	// chuyển hướng

	  header('location: index.php?module=product&action=sua&id='.$pro_id);
 }

?>