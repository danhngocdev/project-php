    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Mới  Banner 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <?php 
  // lấy max của order_link
          $max = mysqli_query($conn,"SELECT MAX(order_link) as 'max_order' FROM banner");
          $r_max = mysqli_fetch_assoc($max);
  // thực hiện upload
      $image = '';// 
      if (!empty($_FILES['image'])) {
        $f = $_FILES['image'];
        $f_name = time().$f['name'];
        if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
          $image = $f_name;
        }
      }
  // lấy dữ liệu POST
      if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $link = $_POST['link'];
        $orderlink = $_POST['orderlink'];
    // thêm dữ liệu vào bảng banner
        $sql = "INSERT INTO banner(name,link,image,order_link) VALUES('$name','$link','$image','$orderlink')";
    // thực hiện truy vấn
        if (mysqli_query($conn,$sql)) {
          header('location: index.php?module=banner');
        } else {
          echo 'Lỗi';
        }
      }
      ?>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="" method="POST" role="form" enctype="multipart/form-data">
          
          <div class="form-group">
            <label for="">Tên Banner</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập Tên Banner...">
          </div>

          <div class="form-group">
            <label for="">Link Banner</label>
            <input type="text" class="form-control" name="link"  placeholder="Nhập Link Banner..">
          </div>
          

          <div class="form-group">
            <label for="">Ảnh Banner</label>
            <input type="file" class="form-control" name="image"  placeholder="ảnh banner">
          </div>
          <div class="form-group">
            <label for="">Vị Trí  Banner</label>
            <input  class="form-control" name="orderlink" placeholder="Vị Trí  Banner" value="<?php echo $r_max['max_order'] +1; ?>">
          </div>
          
          
          
          <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
        
      </div>
      <!-- /.box-body -->
      
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>