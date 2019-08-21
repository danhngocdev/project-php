  <!-- Content Header (Page header) -->
    <section class="content-header">
    Danh Sách Đơn Hàng
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
    $id = isset($_GET['id'])? $_GET['id']: 0 ;
    $query = mysqli_query($conn,"SELECT o.id,o.created,o.status,c.name,c.phone,c.address,c.email,SUM(od.price*od.quantity) as 'total'  FROM orders o JOIN customer c ON c.id = o.customer_id JOIN order_detail od ON od.order_id = o.id WHERE o.id = $id  GROUP BY o.id,o.created,o.status,c.name ORDER BY o.created DESC ");
      $cus =  mysqli_fetch_assoc($query);
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
        <div class="box-body">
          <table class="table table-hover">
         <tr>
           <td>ID</td>
           <td><?php echo $cus['id']; ?></td>
         </tr>
         <tr>
           <td>Tên Khách Hàng</td>
           <td><?php echo $cus['name']; ?></td>
         </tr>
         <tr>
           <td>Email Khách Hàng</td>
           <td><?php echo $cus['email']; ?></td>
         </tr>
         <tr>
           <td>Số Điện Thoại</td>
           <td><?php echo $cus['phone']; ?></td>
         </tr>
         <tr>
           <td>Địa Chỉ Khách Hàng</td>
           <td><?php echo $cus['address']; ?></td>
         </tr>
          <tr>
           <td>Tổng Tiền</td>
           <td><?php echo number_format($cus['total']); ?> VNĐ</td>
         </tr>
         <tr>
           <td>Trạng Thái</td>
           <td>
             <?php if ($cus['status'] == 1) {     ?>
                 <span class="label label-success">Đã Duyệt</span>
                 <a href="index.php?module=order&action=change-status&id=<?php echo $cus['id'];?>&status=0" class="label label-danger"> Bỏ Duyệt</a>
                 <a href="index.php?module=order&action=change-status&id=<?php echo $cus['id'];?>&status=2" class="label label-info"> Giao Hàng</a>
               <?php }else if ($cus['status'] == 2){  ?> 
                 <span class="label label-info">Đã Giao Hàng</span> 
                    <?php }else{ ?>
                    <span class="label label-danger">Chưa Duyệt</span>   
                    <a href="index.php?module=order&action=change-status&id=<?php echo $cus['id'];?>&status=1" class="label label-danger">Duyệt</a>
                <?php } ?>
           </td>
         </tr>
          </table>
        </div>
        <!-- /.box-body -->
        <?php 
   $sql = "SELECT dt.price,dt.quantity,p.name,p.image FROM order_detail dt JOIN product p ON p.id = dt.product_id WHERE dt.order_id = $id";
   $order = mysqli_query($conn,$sql);

         ?>
       <div class="box-footer">
          <h3>Chi Tiết Đơn Hàng</h3>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                 <th>Ảnh</th>
                  <th>Giá</th>
                   <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
              </tr>
            </thead>
            <tbody>
            <?php $n=1; foreach ($order as $od) {
             ?>
              <tr>
                <td><?php echo $n; ?></td>
                <td><img src="../uploads/<?php echo $od['image']; ?>" alt="" width="50"></td>

                  <td><?php echo number_format($od['price']); ?> VNĐ</td>
                   <td><?php echo $od['name']; ?></td>
                    <td><?php echo $od['quantity']; ?></td>
                    <td><?php echo number_format($tong = ($od['quantity'])*($od['price'])); ?></td>
              </tr>
            <?php $n++; } ?>
            </tbody>
          
          </table>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>