  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách Banner <a href="index.php?module=banner&action=them" class="btn btn-default btn-link">Thêm mới</a>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
      $query = mysqli_query($conn,"SELECT * FROM banner ORDER BY order_link ASC");
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
          			<th>Tên Banner</th>
          			<th>Ảnh</th>
                 <th>Sắp Xếp</th>
                <th>Trạng Thái</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($query as $bn) : ?>
              <tr>
                <td><?php echo $bn['id']; ?></td>
                <td><?php echo $bn['name']; ?></td>
                 <td><img src="../uploads/<?php echo $bn['image']; ?>" width="150px"></td>
                 <td> <?php echo $bn['order_link']; ?>  </td>
               <td> 
               <?php if ($bn['status'] == 1) {     ?>
                 <span class="label label-success">Hiện</span>
               <?php }else {  ?> 
                 <span class="label label-danger">Ẩn</span> 
                      
                <?php } ?>

            

                </td>
                <td class="text-right">
                  <a href="index.php?module=banner&action=sua&id=<?php echo $bn['id']; ?>" class="btn btn-xs btn-success">Sửa</a>
                  <a href="index.php?module=banner&action=xoa&id=<?php echo $bn['id']; ?>" class="btn btn-xs btn-danger" onclick ="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
              </tr>
            <?php endforeach; ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>