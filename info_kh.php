
<div class="box-heading">
    <a href="index.php" class="parent-menu">Trang chủ</a>/
    <span class="parent-menu-current">Thông tin khách hàng</span>
</div>
<div>
</div>
<div class="form_tk formthongtin" style="height:auto; width:698px">
	<div class="heading">
        <div class="tieude">
            <h3 style="margin-top:0px">Tóm tắt thông tin</h3>
        </div>
	</div>    
    <table class="thongtinkhachhang" width="50%">
        <tr>
        	<td class="right">Họ tên: </td>
            <td><?php echo isset($_SESSION['name'])?$_SESSION['name']:"" ?></td>
        </tr>
        <tr>
        	<td class="right">Email: </td>
            <td><?php echo isset($_SESSION['name'])?$_SESSION['email']:"" ?></td>
        </tr>
        <tr>
        	<td class="right">Số điện thoại: </td>
            <td><?php echo isset($_SESSION['name'])?$_SESSION['phone']:"" ?></td>
        </tr>
        <tr>
        	<td class="right">Ngày sinh: </td>
            <td><?php echo date($_SESSION['name'])?$_SESSION['birthday']:"" ?></td>
        </tr>
        <tr>
        	<td class="right">Giới tính: </td>
            <!-- <td><?= ($khachhang->Gioi_tinh=="1")?"Nam":"Nữ"?></td> -->
            <td><?php echo isset($_SESSION['gender'])==1?"Nam":"Nữ" ?></td>
        </tr>
        <tr>
        	<td class="right">Địa chỉ: </td>
            <td><?php echo isset($_SESSION['name'])?$_SESSION['address']:"" ?></td>
        </tr>
    </table>
</div>