<?php 
ob_start(); 
include'header.php';
?>



<?php

if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];
    $password = md5($password);
     //Kiểm tra tên đăng nhập có tồn tại không
$query = mysqli_query($conn,"SELECT * FROM customer WHERE email='$email' AND password = '$password'");

// $kq = mysqli_fetch_assoc($query);
//  echo $kq;
// if($kq==1){
//     $_SESSION['khachang']=$kq;
// }
    if (mysqli_num_rows($query) == 0) {
        echo '<script language="javascript">alert("Tên Đăng Nhập Không Tồn Tại Vui Lòng Thử Lại");
         window.location="login-reg.php";</script>';
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
       echo '<script language="javascript">alert("Mật Khẩu Không Đúng");
         window.location="login-reg.php";</script>';
    }
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['birthday'] = $row['birthday'];
    $_SESSION['gender'] = $row['gender'];
    header('location: index.php');
        
      //Lưu tên đăng nhập
      //
   
}

 ?>
  <section class="tzlogin-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="tz-title-bold-5">Đăng Nhập</h3>
                    <form id="tzlogin" class="shopform" method="POST">
                                              <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Email:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="email" name="email" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Mật Khẩu</label>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="password" name="password" value="">
                            </div>
                        </div>
                        <div class="submit-form">
                            <button type="submit" name="dangnhap"><span>Đăng Nhập</span></button>
                        </div>
                       <!--  <span class="tzform-meta">
                            <a href="#">Forgot Your Password?</a>
                            <a href="#">Forgot Your Username?</a>
                            <a href="#">Don’t Have Any Account?</a>
                        </span> -->
                    </form>
                </div>
             <!--     ĐĂNG KÝ -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="tz-title-bold-5">Đăng Ký Tài Khoản</h3>
                    <form action="xu-ly-dang-ky.php" id="fromdangky" class="shopform" method="POST">
                           <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Họ Tên:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="name" value="" id="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Địa Chỉ Email:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="email" name="email" value="" id="email">
                            </div>
                        </div>
                           
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Số Điện Thoại</label>
                               
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="phone" value="" id="mainbody_contentbody_reg_phone">
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Địa Chỉ</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="address" value="" id="address">
                            </div>
                        </div>
                        
                            <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Mật Khẩu:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="password" name="password" value="" id="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Nhập Lại Mật Khẩu:</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="password" name="password2" value="" id="password2" >
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Ngày Sinh</label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <input type="date" name="txtBirthday" size="50" id="txtBirthday">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Giới Tính</label>
                            </div>
                             <select style="color:black" name="gender" class="valid">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                             </select>
                             
                        </div>
                        <div class="submit-form">
                            <button type="submit"  name="from_reg"><span>Đăng ký</span></button>
                            <button type="reset"><span>Nhập Lại</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end class container-->
    </section><!--end class tzblog-wrap-->
   
    <?php include'footer.php'; ?>