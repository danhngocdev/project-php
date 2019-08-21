<?php 


if (isset($_POST['from_reg']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    $name       = ($_POST['name']);
    $password   = ($_POST['password']);
    $password = md5($password);
    $email      = ($_POST['email']);
    $phone      = ($_POST['phone']) ;
    $address    = ($_POST['address']); 
    $txtBirthday =($_POST['txtBirthday']);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "1";
      
    // Validate Thông Tin Username và Email có bị trùng hay không
      
    // Kết nối CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'ndn_shop') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
      
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM customer WHERE  email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Thông tin đăng ký bị lỗi vui lòng thử lại");
         window.location="login-reg.php";</script>';
          
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO customer (name, email, phone, address, password,birthday,gender) VALUES ('$name','$email','$phone','$address', '$password','$txtBirthday','$gender')";
          
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công mời bạn đăng nhập"); window.location="login-reg.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="login-reg.php";</script>';
        }
    }
}

               
 ?>
 
          