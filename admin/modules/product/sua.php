<?php 
    
    $sql="SELECT * FROM category";
    $res= mysqli_query($conn,$sql);
    $cats=[];
    if($res && mysqli_num_rows($res)){
      while($r= mysqli_fetch_assoc($res)){
        $cat[]=$r;
      }
    }
  
 
      

  
 
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql="SELECT * FROM product WHERE id=$id";
      $res=mysqli_query($conn,$sql);
      $result=mysqli_fetch_assoc($res);
    }

 $pro_image= $result['image'];

if (!empty($_FILES['pro_image'])) {
      $image = $_FILES['pro_image'];
      // print_r($image);
      // xu ly upload
      $name = time().$image['name'];
      $check_upload = move_uploaded_file($image['tmp_name'], '../uploads/'.$name);
      if($check_upload){
       $pro_image= $name; 
      }
      $pro_image= $pro_image;

    }
    if(!empty($_POST)){
    $cat_id= $_POST['cat'];
    $pro_name= $_POST['pro_name'];
    $pro_content= $_POST['pro_content'];
    $pro_price= $_POST['pro_price'];
    $pro_sale_price= $_POST['pro_sale_price'];
    $pro_status= $_POST['status'];
 
    $query="UPDATE product SET category_id='$cat_id',name='$pro_name',image='$pro_image',content='$pro_content',price='$pro_price',sale_price='$pro_sale_price',status='$pro_status' WHERE id=$id";
    // echo $query;die;
    $result=mysqli_query($conn,$query);
    if($result){
             if (!empty($_FILES['image'])) {
              $f = $_FILES['image'];
                for($i = 0; $i < count($f['name']); $i++){
                  $f_name = time().$f['name'][$i];
                  $check=move_uploaded_file($f['tmp_name'][$i], '../uploads/'.$f_name);
                  if($check){
                  $sql_img = "INSERT INTO pro_img(link,pro_id) VALUES('$f_name',$id)";
                   mysqli_query($conn,$sql_img);
                    $pro_id = mysqli_insert_id($conn);
                 }
                }
             }
      header("location: index.php?module=product");
    }else{
      echo "Có lỗi khi update.";
    }
    }
 ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content">
       <div class="box">
        <!-- <?php 
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
              header('location: index.php?module=product');
            }
          }

        ?> -->
        <div class="box-body">
          <form action="" method="POST"  enctype="multipart/form-data">
          
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input class="form-control" name="pro_name" value="<?php echo $result['name'] ?>">
            </div>
            <div class="form-group">
              <label for="">Danh mục</label>
              <select name="cat" id="" required="true">
                <option value="">Chọn Danh Mục</option>
                <?php foreach ($cat as $key => $cats) {
                  $selected=($cats['id'] == $result['category_id']) ? 'selected' :'';
                 ?>
                <option <?php echo $selected; ?> value="<?php echo $cats['id'] ?>"><?php echo $cats['name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Giá</label>
              <input class="form-control" name="pro_price" value="<?php echo $result['price'] ?>">
            </div>
            <div class="form-group">
              <label for="">Giá sale</label>
              <input class="form-control" name="pro_sale_price" value="<?php echo $result['sale_price'] ?>">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <input type="file" name="pro_image" onchange="" value="<?php echo $result['image'] ?>">
               <img src="../uploads/<?php echo $result['image']; ?>" style="width: 100px; height: 100px;margin-top: 13px">
            </div>
          
          <div class="item-contact them">
           <label for="">Ảnh có liên quan</label>
           <div class="">
            <div class="row">
                <div id="other-img"  style="padding: 7px 0px;">
                 <?php  $id = $result['id'];
                    // echo $id;
                 $anh = mysqli_query($conn,"SELECT * FROM pro_img WHERE pro_id = $id ");
                 // print_r($anh);

                 ?>
                 <?php foreach($anh as $img) { 
                  ?>

              <div class="col-md-2"> 
               <div class="pro_item hover8">
                  <div >
                   <img src="../uploads/<?php echo $img['link']; ?>" style="width: 100%; height: 120px;" required="">
                </div>
                 <div class="sale">
                    <a class=""  href='index.php?module=product&action=xoaanh&id=<?php echo $img['id']; ?>&pro_id=<?php echo $id;?>' ng-click="login()">x</a>
                 </div>
               </div>
                  
              </div>
              <? echo $img['id']; ?>
                <?php } ?>    
                <!-- <input type="file" class="" id="" name="image1[]" placeholder="" class="flex-last"> -->
            </div>
          </div>
        </div>
        <div style="padding: 7px 0px;">
           <div id="other-img">
                      <input type="file" class="add_img flex-last" multiple="" data-id="1" name="image[]">
                      <div class="review_1"></div>
                    </div>
        </div>


      </div>
            <div class="form-group">
              <label for="">Nội dung</label>
                <textarea name="pro_content" class="form-control" id="content" value="<?php echo $result['content'] ?>"></textarea>
            </div>
              <div class="form-group">
              <label for="">Trạng Thái</label>
          <input  type="radio" name="status" value="1" id="public" <?php echo ($result['status']==1)?'checked':''; ?>>Hiện 
          <input type="radio" name="status" value="0" id="unpublic" <?php echo ($result['status']==0)?'checked':'';?>>
          Ẩn
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="reset" class="btn btn success">Làm Lại</button>
          </form>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>

        <script type="text/javascript">
      function add_img_file(){
        var other = document.getElementById('other-img');
        var input = document.createElement("input");
        input.type = 'file'; 
        input.name='image[]';
        input.className='flex-last';
        other.appendChild(input);
      }
    </script>