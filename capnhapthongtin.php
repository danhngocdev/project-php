<?php include'header.php';
include 'left_Profile.php';
 ?>

<div class="box-heading">
    <a href="index.php" class="parent-menu">Trang chủ</a>/
    <span class="parent-menu-current">Cập nhật thông tin</span>
</div>

<form id="form_tk" class="form_tk form_dky"  onSubmit="return checkform();"  method="post" style="width:698px" name="form_tk">
<div class="heading">
    <div class="tieude">
        <h3 style="margin-top:0px">Cập nhật thông tin</h3>
    </div>
</div>
	<fieldset id="user">
    	<legend>Tài khoản</legend>
        <div class="form-group">
        <table>
            <tr>
            <td><label>*Mật khẩu mới</label></td>
            <td><input type="password" value= "<?=$ttKH->Mat_khau?>" id="password" name="password" placeholder="Nhập mật khẩu" required/></td>
            <td><span class="wanning passwordErr">Mật khẩu phải từ 6 ký tự trở lên</span></td>
            </tr>
            <tr>
            <td><label>*Nhập lại mật khẩu</label></td>
            <td><input type="password" value= "<?=$ttKH->Mat_khau?>" id="confirm_pass" name="confirm_pass" placeholder="Nhập lại mật khẩu của bạn" required/></td>
            <td><span class="wanning confirm_passErr">Mật khẩu nhập lại không đúng</span></td>
            </tr>
        </table>
        </div>
    </fieldset>
    
	<fieldset id="account">
    	<legend>Thông tin cá nhân</legend>
        <div class="form-group">
        <table>
        	<tr>
        	<td><label>*Họ tên</label></td>
            <td><input type="text" id="hoten" value= "<?=$ttKH->Ten_KH?>" name="hoten" placeholder="Nhập họ tên của bạn" required/></td>
            <td><span class="wanning hotenErr">Vui lòng nhập họ tên</span></td>
            </tr>
            <tr>
            <td><label>*Email</label></td>
            <td><input type="text" id="email" value= "<?=$ttKH->Email?>" name="email" placeholder="Nhập email của bạn" required/></td>
            <td><span class="wanning emailErr">Sai định dạng email VD:itplus.academy@gmail.com</span></td>
            </tr>
            <tr>
            <td><label>Số điện thoại</label></td>
            <td><input type="text" id="phone" name="phone" value="<?=$ttKH->SDT?>" placeholder="Nhập số điện thoại của bạn" /></td>
            </tr>
            <tr>
            <td><label>Ngày sinh</label></td>
            <td><input type="date" id="ngaysinh" name="ngaysinh" placeholder="Nhập ngày sinh" value="<?=date($ttKH->Ngay_sinh)?>" /></td>
            </tr>
            <tr>
            <td><label>Chọn giới tính</label></td>
            <td>
            <select style="color:black">
            	<option value="1">Nam</option>
                <option value="0"<?php if ($ttKH->Gioi_tinh=='0') echo "selected"?>>Nữ</option>
            </select>
            </td>
            </tr>
           </table>
        </div>
    </fieldset>
    
    <fieldset id="address">
    	<legend>Địa chỉ</legend>
        <div class="form-group">
        	<table>
            <tr>
        	<td><label>Địa chỉ</label></td>
            <td><input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ của bạn" value="<?=$ttKH->Dia_chi?>"  /></td>
            </tr>
            </table>
        </div>
    </fieldset>
        <input type="submit" id="btnSubmitCapnhat" name="btnSubmitCapnhat" value="Cập nhật" style="margin-top:34px"/>
</form>

<script>
	function checkform()
		{
			var loi = false;
			pass = $("input#password").val();
			confirm_pass = $("input#confirm_pass").val();
			hoten = $("input#hoten").val();
			email = $("input#email").val();
			re_email = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]+$/;
			if (pass.length<6)
			{
				$("span.passwordErr").show();
				loi = true;
			}
			if (pass  != confirm_pass)
			{
				$("span.confirm_passErr").show();
				loi = true;
			}
			if (!re_email.test(email))
			{
				$("span.emailErr").show();
				loi = true;
			}
			return (!loi);
		}
</script>
<?php
		if (isset($_POST["btnSubmitCapnhat"]))
			{
				$user = $_SESSION["user"];
				$password = isset($_POST["password"]) ? $_POST["password"] : "";
				$name = isset($_POST["hoten"]) ? $_POST["hoten"] : "";
				$email = isset($_POST["email"]) ? $_POST["email"] : "";
				$SDT = isset($_POST["phone"]) ? $_POST["phone"] : "";
				$ngaysinh = isset($_POST["ngaysinh"]) ? $_POST["ngaysinh"] : "";
				$gioitinh = isset($_POST["gioitinh"]) ? $_POST["gioitinh"] : "1";
				$diachi = isset($_POST["diachi"]) ? $_POST["diachi"] : "";
				$this->model->capnhat($name,$diachi,$SDT,$user,$password,$ngaysinh,$gioitinh,$email);
				$_SESSION["user"] = $user;
				$_SESSION["password"] = $password;
				echo "<script> alert('Cập nhật thành công thành công') </script>";
				echo "<script> window.location = 'index.php' </script>";
			}
?>
<?php include'footer.php'; ?>