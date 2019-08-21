<?php 
include'header.php';
include 'slider.php';
 ?>
<?php 
if (isset($_GET['ten_sp'])) {
     $current_search = isset($_GET['ten_sp']) ? $_GET['ten_sp'] : '';
    $name = $_GET['ten_sp'];
    $pro = mysqli_query($conn,"SELECT * FROM product WHERE name LIKE '%$name%'");
    // $kq  = mysqli_num_rows($qr);
    $total = mysqli_num_rows($pro);
    $show = 6;
    $total_page = ceil($total/$show);
    $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
    if($current_page > $total_page){
        $current_page = $total_page;
    }
    if($current_page < 1){
        $current_page = 1 ;
    }
    $start = ($current_page-1)*$show;
    $next = $current_page < $total_page ? $current_page + 1 : $total_page;
    $prev = $current_page < 1 ? $current_page - 1 : 1;
    $qr = mysqli_query($conn,"SELECT * FROM product WHERE name LIKE '%$name%' LIMIT $start, $show");

}
 ?>
<section class="main-content-section">
                <div class="container">
                    <div class="row">
                        <?php include('left.php'); ?>
                    
                    <!-- LEFT-SIDEBAR END -->
                
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="row">
                                    <?php if ($total == 0) : ?>
                                        
                                     <div class="left-title-area">
                                <h2 class="left-title">Không Có Kết Quả Tìm Kiếm Cho "<span style="color: red;"><?php echo $name ?></span>"</h2>
                                   
                                <?php else: ?>
                                     <div class="left-title-area">
                                <h2 class="left-title">Kết Quả Tìm Kiếm Cho "<span style="color: red;"><?php echo $name ?></span>"</h2>
                             <?php endif ?>
                            </div>
                            <?php foreach ($qr as $pronp) {                               
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 laster-shop-item">
                            <div class="laster-thumb">
                                <div class="shop-icon-data">
                                    <img src="demos/hosts.png" alt="hosts">
                                </div>
                                <img src="uploads/<?php echo $pronp['image'] ?>">
                                <span class="tz-shop-meta">
                                     <a href="chitietsp.php?id=<?php echo $pronp['id']; ?>" class="tzheart">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="xu-ly-gio-hang.php?id=<?php echo $pronp['id'];?>&action=add" class="tzshopping add-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                   
                                    
                                </span>
                            </div>
                            <h6><a href=""><?php echo $pronp['name']; ?></a></h6>
                            <small style="color: red"><?php echo number_format($pronp['price']);  ?> VNĐ </small>
                        </div>
                    <?php } ?>
                 
                    </div>

                </div>
                </div>

            </div> 
              </div> 
              <div class="chantrang" align="center">
    <ul class="pagination">
        <li><a href="search.php?ten_sp=<?php echo $current_search; ?>&page=<?php echo $prev; ?>">&laquo;</a></li>
        <?php for ($i = 1; $i <= $total_page; $i++) :
            $class_active = ($i == $current_page) ? ' class="active"' : '';
            ?>
            <li <?php echo $class_active; ?>><a href="search.php?ten_sp=<?php echo $current_search?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

        <?php endfor ?>
        <li><a href="search.php?ten_sp=<?php echo $current_search ?>&page=<?php echo $next; ?>">&raquo;</a></li>
    </ul>
</div>
                </section>
              

<?php include'footer.php'; ?>


