<?php 
$id = isset($_GET['id']) ? $_GET['id']: 0 ;
$status = isset($_GET['status']) ? $_GET['status'] : 0;
if ($status !=2) {
	mysqli_query($conn,"UPDATE orders SET status = $status WHERE id = $id");
}

header('loaction: index.php?module=order&action=detail&id='.$id);

 ?>