<?php if (isset($_GET['id'])) {
	$id = $_GET['id'];
}else {
	$id =0;
}
$sql = "DELETE FROM banner WHERE id = $id";
if (mysqli_query($conn,$sql)) {
	header('location: index.php?module=banner');
	}else {
		echo 'Không cho phép xóa';
	}

?>
left.php?id=<?php echo $prod['id']; ?>