<section class="content-header">
  	<h1>
  		Sửa danh mục
  	</h1>
  </section>
   <section class="content">

  	<!-- Default box -->
  	<div class="box">
  		<?php 
  		$id = isset($_GET['id']) ? $_GET['id'] : 0;

  		$query = mysqli_query($conn,"SELECT * FROM category WHERE id=$id");
  		$cats = mysqli_fetch_assoc($query);

  		
  		if (isset($_POST['name'])) {
  			$name = $_POST['name'];
  		
  			$sql = "UPDATE category SET name = '$name' WHERE id = $id";

  			$res = mysqli_query($conn,$sql);

  			if ($res) {
  				header('location: index.php?module=category');
  			}
  		}

  		?>
  		<div class="box-body">
  			<form action="" method="POST"  enctype="multipart/form-data">
  				<div class="form-group">
  					<label for="">Tên danh mục</label>
  					<input class="form-control" name="name" value="<?php echo $cats['name'];?>">
  				</div>
  				
         <button type="submit" class="btn btn-primary">Lưu</button>
       </form>
     </div>
   </div>
   <!-- /.box-body -->
   <!-- /.box -->
 </section>