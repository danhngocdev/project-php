<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách danh mục <a href="index.php?module=banner&action=them" class="btn btn-default btn-link">Thêm mới</a>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
      $query = mysqli_query($conn,"SELECT * FROM banner");
    ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
          <?php 
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $query = mysqli_query($conn, "SELECT * FROM banner WHERE id = $id");
            $banners = mysqli_fetch_assoc($query);
            // lấy max ordering 
            $max = mysqli_query($conn, "SELECT max(order_link) as 'max_order' FROM banner");
            $r_max = mysqli_fetch_assoc($max);
            // thực hiện sửa - upload banner
            $image = $banners['image']; // khi người dùng không chọn ảnh mới thì nó vẫn hiện và giữ ảnh cũ
            if(!empty($_FILEs['image']['name'])){
              $file = $_FILES['image'];
              $img_name = time().$fiile['name'];
              $check_uploads = move_uploaded_file($file['tmp_name'], '../uplpads/'.$img_name);
              $image = $img_name;
            }

            // thực hiện lưu banner
            if(isset($_POST['name'])){
              $name = $_POST['name'];
              $id = $_POST['id'];
              $ordering = $_POST['ordering'] + 1;
              $status = $_POST['status'];

              $sql = "UPDATE banner SET id = '$id', name = '$name', image = '$image',  order_link = '$ordering', status = '$status'  WHERE id = $id";
              $res = mysqli_query($conn, $sql);

              if($res){
                header('location: index.php?module=banner');
              }
            }

          ?>
        

        <div class="box-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">ID</label>
              <input type="text" name="id" class="form-control" value="<?php echo $banners['id']; ?>" placeholder="Nhập ID ( 0 - 9 )">
            </div>
            <div class="form-group">
              <label for="">Tên banner</label>
              <input type="text" name="name" value="<?php echo $banners['name']; ?>" class="form-control" placeholder="nhập tên banner">
            </div>
            <div class="form-group">
              <input type="file" name="image">
              <img src="../uploads/<?php echo $banners['image']; ?>" alt="" width="130">
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
              <div class="radio">
                <label>
                  <input type="radio" name="status"value="1" checked="checked">
                  hiển thị
                </label>
                <label>
                  <input type="radio" name="status" value="0" >
                  Ân
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="">Vị trí Sắp xếp</label>
              <?php $query = mysqli_query($conn, "SELECT * FROM banner ORDER BY order_link ASC"); ?>
              <select name="ordering"  class="form-control">
                <option value="0">Đầu tiên</option>
                <?php foreach($query as $bn ) : ?>
                <option value="<?php echo $bn['order_link']; ?>"><?php echo $bn['name']; ?></option>
                <?php endforeach; ?>
                <option value="<?php echo $r_max['max_order'] + 1; ?>">Sau cùng</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Lưu</button>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>