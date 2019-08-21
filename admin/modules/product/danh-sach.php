<?php 
$sql ="SELECT p.id,p.name,p.image,p.price,p.sale_price,p.created,p.content,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id= c.id";
//
// if (!empty($_POST['ten_sp']) && empty($_POST['danh_muc'])) {
//   $ten_sp = $_POST['ten_sp'];
//   $sql = "SELECT p.id,p.name,p.image,p.price,p.sale_price,p.created,p.content,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id 
//   WHERE p.name like '%$ten_sp%'";
// }
// if (!empty($_POST['danh_muc']) && empty($_POST['ten_sp'])) {
//   $danh_muc = $_POST['danh_muc'];

//   $sql = "SELECT p.id,p.name,p.image,p.price,p.sale_price,p.created,p.category_id,p.content,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id WHERE p.category_id = $danh_muc";
 
//  }
// if (!empty($_POST['danh_muc']) && !empty($_POST['ten_sp'])) {
//   $danh_muc = $_POST['danh_muc'];
//   $ten_sp = $_POST['ten_sp']; 
//   $sql = "SELECT p.id,p.name,p.image,p.price,p.sale_price,p.created,p.category_id,p.content,c.name as 'cat_name' FROM product p JOIN category c ON p.category_id = c.id WHERE p.category_id = $danh_muc AND p.name like '%$ten_sp%'";
   
   
// }

$cats = mysqli_query($conn,"SELECT id,name FROM category ORDER BY name ASC");
// phân trang
// $page = mysqli_query($conn,$sql);
// $total = mysqli_num_rows($page);
// $show = 6;

//   $total_page = ceil($total/$show); // hàm làm tròn ceil
//    $pageht = isset($_GET['page']) ? $_GET['page'] : 1;
//     $start =   ($pageht - 1) *$show;
//     if ($pageht > $total_page) {
//         // $pageht = $total_page;
//         header('location: index.php?module=product&page='.$total_page);
//     }
//     if ($pageht < 1) {
//         // $pageht = $total_page;
//         header('location: index.php?module=product&page=1');
//     }

//     $next = $pageht < $total_page ? $pageht +1 : $total_page;
//     $prev = $pageht > 1 ? $pageht -1 :1;
  

$product = mysqli_query($conn,$sql); 
 ?>  <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Danh Sách Sản Phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
        <!-- <form action="" method="POST" class="form-inline" role="form">
        
          <div class="form-group">
           <input type="text" class="form-control" name="ten_sp" placeholder="Tìm Kiếm...">
          </div>
        
            <div class="form-group">
           <select name="danh_muc" class="form-control">
             <option value="">Chọn Danh Mục</option>
             <?php foreach ($cats as $cat) {
               
             ?>
                <option value="<?php echo $cat['id'];?>"><?php echo $cat['name']; ?></option>
                <?php  }?>
           </select>
          </div>
        
        
          <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
        </form> -->
        <div class="box-body">
          <table class="table table-hover" id="myTable">
          	<thead>
          		<tr>
          			<th>ID</th>
                <th>ảnh</th>
          			<th>Tên sản phẩm</th>
                <th>Danh Mục</th>
          			<th>Giá</th>
          			<th>Ngày tạo</th>
          			<th></th>
          		</tr>
          	</thead>
          	<tbody>
              <?php foreach ($product as $pro) {
               ?>
          		<tr>
          			<td><?php echo $pro['id'];?></td>
                <td>
                  <img width="50px" src="../uploads/<?php echo $pro['image']; ?>" alt="">
                </td>
          			<td><?php echo $pro['name'];?></td>
                <td><?php echo $pro['cat_name'];?></td>
          			<td><?php echo number_format($pro['price']);?></td>
          			<td><?php echo date('d-m-Y',strtotime($pro['created'])); ?></td>
          			<td class="text-right">
                         <a class="btn btn-primary" data-toggle="modal" id='xem' value ="xem" href='#modal-<?php echo $pro['id']; ?>'><i class="glyphicon glyphicon-eye-open"></i></a>
            						<a href="index.php?module=product&action=sua&id=<?php echo $pro['id']; ?>" class="btn btn btn-success"><span class="glyphicon glyphicon-edit
                         glyphicon "></span></a>
            						<a href="index.php?module=product&action=xoa&id=<?php echo $pro['id'];?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không?')"><span class="glyphicon glyphicon-trash"></span></a>
              
          			</td>
          		</tr>
              <div class="modal fade" id="modal-<?php echo $pro['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Chi Tiết Sản Phẩm</h4>
            </div>
            <div class="modal-body">
                      <h4>Sản Phẩm <?php echo $pro['name']; ?></h4>
                      <h4>Ảnh</h4>
                      <img src="../uploads/<?php echo $pro['image']; ?>"  alt=""style="width: 100px; height: 100px;">
                      <h4>Giá cũ : <?php echo number_format($pro ['price']); ?> VNĐ</h4>
                      <h4>Giá mới : <?php echo number_format($pro['sale_price']); ?></h4>
                      <h4>Thông tin:</h4>
                      <p><?php echo $pro['content'];?></p>
                      <p><?php echo $pro['created'];?></p>
            </div>
          
          </div>
        </div>
      </div>

              <?php }
               ?>
          	</tbody>
          </table>
        </div>

      
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
     <!--    <div class="tranchang" align="center">
        <ul class="pagination pagination-sm">
          <li><a href="index.php?module=product&page=<?php echo $prev ?>">&laquo;</a></li>
          <?php for ($i = 1; $i <= $total_page ; $i++) {
            $class_active =($i == $pageht) ? 'class = "active" ': '';
          ?>
          <li <?php echo $class_active; ?>><a href="index.php?module=product&page=<?php echo $i ?>"><?php echo $i; ?></a></li>
        
      <?php  }  ?>
          <li><a href="index.php?module=product&page=<?php echo $next ?>">&raquo;</a></li>
        </ul>
      </div> -->
    </div>
      <!-- /.box -->

    </section>