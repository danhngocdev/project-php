  <!-- Content Header (Page header) -->
    <section class="content-header">
      <form action="" method="POST" class="form-inline" role="form">
      
        <div class="form-group">
          <label style="color: red;">Nhập Tên Danh Mục</label>
          <input type="text" class="form-control" id="cat_name" name="name" placeholder="Thêm Mới Danh Mục..">
        </div>
      <button type="button" class="btn btn-primary add-category">Thêm Mới</button>
      </form>

      <h1>
        Danh sách danh mục
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
      $query = mysqli_query($conn,"SELECT * FROM category");

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
          <table class="table table-hover" id="list">
          	<thead>
          		<tr>
          			<th>ID</th>
          			<th>Tên Danh Mục</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($query as $cat) : ?>
              <tr>
                <td><?php echo $cat['id']; ?></td>
                <td><?php echo $cat['name']; ?></td>
                <td class="text-right">
                  <a href="index.php?module=category&action=sua&id=<?php echo $cat['id'];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a href="index.php?module=category&action=xoa&id=<?php echo $cat['id'];?>" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            <?php endforeach; ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      </section>
      
      <div class="modal fade" id="modal-message">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             
            </div>
          </div>
        </div>
      </div>
    