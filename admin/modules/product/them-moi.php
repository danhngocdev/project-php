  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới sản phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <?php 
        $cats = mysqli_query($conn,"SELECT id,name FROM category");
        // thực hiện uploads 
        $image = '';

          if (!empty($_FILES['image'])) {
            $file = $_FILES['image'];
            $img_name = time().$file['name'];
            $check_upload = move_uploaded_file($file['tmp_name'], '../uploads/'.$img_name);
            $image = $img_name;
          }

        // lưu thông tin vào bảng sản phẩm

          if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $category_id = $_POST['category_id'];
            $content = $_POST['content'];

            $sql = "INSERT INTO product(name,image,price,sale_price,category_id,content) 
            VALUES('$name','$image','$price','$sale_price','$category_id','$content')";

            $res = mysqli_query($conn,$sql);

            if ($res) {
              // lấy về id vừa thêm mới
              $pro_id = mysqli_insert_id($conn);
              if (!empty($_FILES['image_orther']['name'])) {
               $orther = $_FILES['image_orther']; 

               for ($i = 0; $i < count($orther['name']) ; $i++) {

                 $orther_name = time().($orther['name'][$i]);
                
                 if (move_uploaded_file($orther['tmp_name'][$i],'../uploads/'.$orther_name)) {
                  $sql_insert = "INSERT INTO pro_img (link,pro_id) VALUES('$orther_name','$pro_id')";
                   $res1 = mysqli_query($conn,$sql_insert);
                 }
               }
                
              }
              header('location: index.php?module=product');
            }
          }

        ?>
        <div class="box-body">
          <form action="" method="POST"  enctype="multipart/form-data">
          
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input class="form-control" name="name" placeholder="Tên sản phẩm.." required="">
            </div>
            <div class="form-group">
              <label for="">Danh mục</label>
              <select name="category_id" class="form-control" required="required">
              <?php foreach($cats as $cat) { ?>
                <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Giá</label>
              <input class="form-control" name="price" placeholder="Giá chính.." required="">
            </div>
            <div class="form-group">
              <label for="">Giá sale</label>
              <input class="form-control" name="sale_price" placeholder="Giảm giá.." required="">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="file" name="image" onchange="hien_thi_anh(this)" required="">
              <img src="" alt="" id="show_img" width="120px">
            </div>
             <div class="form-group">
              <label for="">Ảnh Khác <button type="button" onclick="them_anh_khac()">+</button></label>
              <input type="file" name="image_orther[]" required="" >
              <div id="more_img">
                
              </div>    
            </div>
            <div class="form-group">
              <label for="">Nội dung</label>
                <textarea name="content" class="form-control" id="content" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
          </form>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>