    <?php 
    include('header.php');

    ?>

    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <?php include('left.php'); ?>

                <!-- LEFT-SIDEBAR END -->
                <?php 
                $id = $_GET['id'];
                $current_id = isset($_GET['id']) ? $_GET['id'] :1;
                $c = mysqli_query($conn,"SELECT name FROM category WHERE id = $id");
                $cats = mysqli_fetch_assoc($c);
                ?>

                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="row">
                        <div class="left-title-area">
                            <h2 class="left-title"><?php echo $cats['name']; ?></h2>
                        </div>
                        <?php 
                        // $newproduct = mysqli_query($conn,"SELECT * FROM product WHERE status = 1 AND category_id = $id ORDER BY created DESC ");


    // XỬ LÝ PHÂN TRANG 
    // // + Thiết lập số sản phẩm được hiển thị trong mỗi trang
                        $show = 3;
    // + Xác định xem có tất cả bao nhiêu dòng cần phân trang
                     $sql = "SELECT COUNT(*) FROM  product WHERE status = 1 AND category_id = $id ORDER BY created DESC";
                        $san_pham = $conn->query($sql);
                        $row =mysqli_fetch_array($san_pham);
                        $tongsodong = $row[0];
     // + Xác định xem có tất cả là bao nhiêu trang
                        $tongsotrang = ceil($tongsodong/$show);
            // + Liệt kê danh sách các số trang dưới dang các liên kết
                //Xem phía cuối file

    // + Nhận số trang được gửi về từ client khi người dùng click trên các link số trang
                        $page = isset($_GET["page"]) ? $_GET["page"]: 1 ;
            //+ Xử lý trường hợp số trang không nằm trong khoảng [1, $tongsotrang]
           // tạo biến tiến và  lùi
                        $next = $page <  $tongsotrang ?  $page +1 : $tongsotrang;
                        $prev = $page >  1 ?  $page - 1 :1;

            // + Tính vị trí dòng bắt đầu của trang cần lấy dữ liệu
                        $star = ($page-1)*$show;
                        $sql = mysqli_query($conn,"SELECT * FROM  product WHERE status = 1 AND category_id = $id ORDER BY created DESC LIMIT $star, $show");
     
                        ?>       
                             <?php foreach ( $sql as $value) {      
                              ?>                 
             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 laster-shop-item <?php echo $value['category_id']; ?>">
                                <div class="laster-thumb">
                                    <div class="shop-icon-data">
                                        <img src="demos/new.png" alt="hosts">
                                    </div>
                                    <img src="uploads/<?php echo $value['image'];?>">
                                    <span class="tz-shop-meta">
                                               <a href="chitietsp.php?id=<?php echo $value['id']; ?>" class="tzheart">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                               </a>
                                                <a href="xu-ly-gio-hang.php?id=<?php echo $value['id'];?>&action=add" class="tzshopping add-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                </a>
                                   </span>
                            </div>
                            <h6><a href=""><?php echo $value['name']; ?></a></h6>
                            <small style="color: red"><?php echo number_format($value['price']);  ?> VNĐ </small>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page" align="center">
      <ul class="pagination">
        <li><a href="category.php?id=<?php echo $current_id?>&page=<?php echo $prev; ?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= $tongsotrang; $i++) :
            $class_active = ($i == $page) ? ' class="active"' : '';
            ?>
            <li <?php echo $class_active; ?>><a href="category.php?id=<?php echo $current_id?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

        <?php endfor ?>
        <li><a href="category.php?id=<?php echo $current_id?>&page=<?php echo $next; ?>">&raquo;</a></li>
    </ul>
</div>
</section>          <!-- MAIN-CONTENT-SECTION END -->
<?php include('footer.php'); ?>