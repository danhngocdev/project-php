<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

		<?php 
	      	include'../sql/connect.php';
            
			 ?>
			 <?php 
			  		$id = isset($_POST['id']) ? $_POST['id'] : 0;
               if (isset($_POST['doimatkhau'])) {
               	$email = $_POST['email'];
               	$matkhaucu = $_POST['matkhaucu'];
               	$password = $_POST['password'];
          	$sql_doimk = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email' AND password = '$matkhaucu'");
               	$get = mysqli_num_rows($sql_doimk);
               	if ($get == 0) {
             
               	}else {
               		$update = mysqli_query($conn,"UPDATE admin SET password = '$password' WHERE id = $id");
               		echo 'Thay Đổi Mật Khẩu Thành Công';
               	}
               	
               }

			  ?>
<!doctype html>
<html>
<head>
<title>Đổi Mật Khẩu Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/css1.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css -->
</head>
<body>
<h1 class="w3ls">Đổi Mật Khẩu Admin</h1>
<div class="content-w3ls">
	<div class="content-agile1">
		<h2 class="agileits1">Official</h2>
		<p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
	<div class="content-agile2">
		<form action="" method="POST">
			<div class="form-control w3layouts"> 
				<input type="email" id="firstname" name="email" placeholder="Email"  required="">
			</div>

			<div class="form-control w3layouts">	
				<input type="password" id="email" name="matkhaucu" placeholder="Mật Khẩu Cũ"  required="">
			</div>

			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="password" placeholder="Mật Khẩu Mới" id="password1" required="">
			</div>	

			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="confirm-password" placeholder="Nhập Lại Mật Khẩu Mới" id="password2" required="">
			</div>			
			
			<input type="submit" name="doimatkhau" class="register" value="Đổi Mật Khẩu">
		</form>
		<script type="text/javascript">
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}
			function validatePassword(){
				var pass2=document.getElementById("password2").value;
				var pass1=document.getElementById("password1").value;
				if(pass1!=pass2)
					document.getElementById("password2").setCustomValidity("Nhập Lại Mật Khẩu Phải Giống Nhau");
				else
					document.getElementById("password2").setCustomValidity('');	 
					//empty string means no validation error
			}
		</script>
	
	</div>
	<div class="clear"></div>
</div>
<p class="copyright w3l">© 2017 Official Signup Form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts</a></p>
</body>
</html>