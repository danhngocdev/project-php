  <!-- Content Header (Page header) -->
    <section class="content-header">
    Danh Sách Đơn Hàng
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
    $query = mysqli_query($conn,"SELECT o.id,o.created,o.status,c.name,SUM(od.price*od.quantity) as 'total'  FROM orders o JOIN customer c ON c.id = o.customer_id JOIN order_detail od ON od.order_id = o.id GROUP BY o.id,o.created,o.status,c.name ORDER BY o.created DESC ");
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
          	<thead>
          		<tr>
          			<th>ID</th>
          			<th>Tên Khách Hàng</th>
          			<th>Ngày Đặt</th>
                 <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($query as $cus) { ?>
              <tr>
                <td><?php echo $cus['id']; ?></td>
                <td><?php echo $cus['name']; ?></td>
                 <td><?php echo date('d/m/Y',strtotime($cus['created'])); ?></td>
                 <td><?php echo number_format($cus['total']); ?> VNĐ</td>
               <td> 
               <?php if ($cus['status'] == 1) {     ?>
                 <span class="label label-success">Đã Duyệt</span>
               <?php }else if ($cus['status'] == 2){  ?> 
                 <span class="label label-info">Đã Giao Hàng</span> 
                    <?php }else{ ?>
                    <span class="label label-danger">Chưa Duyệt</span>   
                <?php } ?>

            

                </td>
               <td><a href="index.php?module=order&action=detail&id=<?php echo $cus['id']; ?>" class="label label-success" >Xem Chi Tiết</a></td>
              </tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>