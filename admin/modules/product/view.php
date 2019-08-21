<?php 
include'../sql/connect.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
 $sql =	"SELECT * FROM product WHERE id = $id";
 $res = mysqli_query($conn,$sql);
 $reslus = mysqli_fetch_assoc($res);
 }
 ?>
 <table  width="500px" cellpadding="10" cellspacing="0" border="1" align="center">
  	<tbody>
 		<tr>
 			<th align="right"> ID</th>
 			<td><?php echo $reslus['id']; ?></td>
 		
 	</tr>
 		<tr>
 			<th align="right">	Category_ID</th>
 			<td><?php echo $reslus['category_id']; ?></td>
 	
 	</tr>
 		<tr>
  			<th align="right">Product Name</th>
 			<td><?php echo $reslus['name']; ?></td>
 		
 	</tr>
 		<tr>
 			<th align="right">Images</th>
 			<td><img src="../uploads/<?php echo $$reslus['image']; ?>" alt=""></td>
 		
 	</tr>
 		<tr>
 			<th align="right">Content</th>
 			<td><?php echo $reslus['content']; ?></td>
 			             
 	
 	</tr>
 		<tr>
 			<th align="right">Price</th>
 			<td><?php echo $reslus['price']; ?></td>
 		
 	</tr>
 		<tr> 
 			<th align="right">Sale_Price</th>
 			<td><?php echo $reslus['sale_price']; ?></td>
 	 	</tr>
 	 	<tr> 
 			<th align="right">Created</th>
 			<td><?php echo $reslus['created']; ?></td>
 	 	</tr><tr> 
 			<th align="right">Status</th>
 			<td><?php echo $reslus['status']; ?></td>
 	 	</tr>

 	</tbody>
 </table>
