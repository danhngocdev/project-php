<?php 
session_start();
include'sql/connect.php';
include 'sql/card.funcion.php';
$id = isset($_GET['id']) ? $_GET['id'] :0 ;
$action = isset($_GET['action']) ? $_GET['action'] : 'add' ;
// lấy số lượng trên URL
$quan =  isset($_GET['quantity']) ? $_GET['quantity'] : 1 ;
// kiểm tra người dùng nhập vào là số
$quan = is_numeric($quan) ? $quan : 1;
// kiểm tra > 0
$quan = $quan > 0 ? $quan :1;

// truy vấn dữ liệu sp theo id
$qr = mysqli_query($conn,"SELECT id,name,image,price,sale_price FROM product WHERE id = $id");
$pro = mysqli_fetch_assoc($qr);
if ($action == 'add') {
	if (isset($_SESSION['gio-hang'][$id])) {
		$_SESSION['gio-hang'][$id]['quantity'] +=1;
		
	}else{ // thực hiện thêm mới 1 sp vào giỏ
		$_SESSION['gio-hang'][$id] = [
			'id' => $pro['id'],
			'name' => $pro['name'],
			'image' => $pro['image'],
			'price' => ($pro['sale_price'] > 0) ? $pro['sale_price'] : $pro['price'],
			'quantity' => 1
		];
	}	

	 $message = [
      'success' => true,
      'msg' => 'Thêm Sản Phẩm Vào Giỏ Hành Thành Công',
      'tong_so_luong' => tong_so_luong()
 	 ];
	 echo json_encode($message);
}
if ($action == 'delete') {
	if (isset($_SESSION['gio-hang'][$id])) {
	 unset($_SESSION['gio-hang'][$id]);
	 	 echo json_encode('xóa sản phẩm thành công');
		}
	  // header('location: shop-cart.php');
 }


if ($action == 'update') {
	if (isset($_SESSION['gio-hang'][$id])) {
		$_SESSION['gio-hang'][$id]['quantity'] = $quan;
		header('location: shop-cart.php');
	}
}
  




//chuyển hướng sang trang giỏ hàng
 // header('location: shop-cart.php');
// echo '<pre>';
// print_r($_SESSION['gio-hang']
      //session_destroy();
 ?>