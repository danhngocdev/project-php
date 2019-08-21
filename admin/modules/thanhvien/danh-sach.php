  <!-- Content Header (Page header) -->
    <section class="content-header">
    Danh Sách Thành Viên
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
    $query = mysqli_query($conn,"SELECT * FROM customer");
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
          			<th>Email</th>
                 <th>Phone</th>
                <th>Địa Chỉ</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Chức Năng</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($query as $cus) { ?>
              <tr>
                <td><?php echo $cus['id']; ?></td>
                <td><?php echo $cus['name']; ?></td>
                 <td><?php echo $cus['email']; ?></td>
                 <td><?php echo $cus['phone']; ?></td>
               <td><?php echo $cus['address']; ?></td>
               <td><?php echo date($cus['birthday']); ?></td>
               <td><?php echo $cus['gender']==0?"Nam":"Nữ"; ?></td>
              <td>  <a href="index.php?module=thanhvien&action=xoa&id=<?php echo $cus['id'];?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không?')"><span class="glyphicon glyphicon-trash"></span></a></td>
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