 <style>
 	.required{
 		color: red;
 	}
 </style>
 <?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$oldpassword= $_POST['oldpassword'];
	$passwordnew =md5(trim($_POST['passwordnew']));
	$query = "SELECT id,password FROM admin WHERE password ='$oldpassword' AND id ={$_SESSION['admin_login']['id']}";
	$res = mysqli_query($conn,$query);
	if (mysqli_num_rows($res)==1) {
		if (trim($_POST['passwordnew'])!=trim($_POST['confirmpassword'])) {
			echo "<p class='required'>Mật Khẩu Mới Không Giống Nhau </p>";
		}
		else {
			$update = "UPDATE admin SET password='$passwordnew' WHERE id ={$_SESSION['admin_login']['id']}";
			$resq = mysqli_query($conn,$update);
			if (mysqli_affected_rows($conn)==1) {
				echo "<p style='color:green'>Đổi Mật Khẩu Thành Công</p>";
			}
		}
	}
	else {
		echo  "<p class='required'>Mật Khẩu Cũ Không Đúng </p>";
	}
}
  ?>
<form action="" method="POST" role="form" name="changepass">
	<legend>Đổi Mật Khẩu</legend>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" name="email" id="" value="<?php echo $_SESSION['admin_login']['email']; ?>" disabled="true" >
		<?php 
         if (isset($erros) && in_array('email',$erros)) {
         	echo "<p class='required'>Email không Hợp Lệ</p>";
         }
		 ?>
	</div>
	<div class="form-group">
		<label for="">Old password</label>
		<input type="password" class="form-control" name="oldpassword" id="" placeholder="Nhập Mật Khẩu">
		<?php 
         if (isset($erros) && in_array('password',$erros)) {
         	echo "<p class='required'>Mậ Khẩu  Không Được Trông</p>";
         }
		 ?>
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="passwordnew" id="" placeholder="Nhập Mật Khẩu">
		<?php 
         if (isset($erros) && in_array('password',$erros)) {
         	echo "<p class='required'>Mậ Khẩu  Không Được Trông</p>";
         }
		 ?>
	</div>
    <div class="form-group">
		<label for="">Confirm new password</label>
		<input type="password" class="form-control" name="confirmpassword" id="" placeholder="Xác Nhận Mật Khẩu">
			<?php 
         if (isset($erros) && in_array('password1',$erros)) {
         	echo "<p class='required'>Mật Khẩu Không Giống Nhau</p>";
         }
		 ?>
	</div>
	

	<button type="submit" class="btn btn-primary" name="adduser">Thay Đổi</button>
</form>