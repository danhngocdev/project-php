   	<?php include('header.php');
      include('sql/connect.php');

      ?>

     <?php 
include'slider.php';
      ?>
               <!-- HEADER-BOTTOM-AREA END -->
               <!-- MAIN-CONTENT-SECTION START -->

               <section class="main-content-section">
                  <div class="container">
                     <div class="row">
                        <?php include('left.php'); ?>

                        <!-- LEFT-SIDEBAR END -->
                        <?php 
                        $newProduct =   mysqli_query($conn,"SELECT * FROM product Where status = 1 ORDER BY created DESC LIMIT 6");
                        ?>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="row">
                                <div class="left-title-area">
                                    <h2 class="left-title">Sản Phẩm Nổi Bật</h2>
                                </div>
                                <?php foreach ($newProduct as $pronp) {
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
                            <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>	        <!-- MAIN-CONTENT-SECTION END -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section-full-column">
       <div class="container">
          <div class="row">
             <!-- IMAGE-ADD-AREA START -->
             <div class="image-add-area">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                   <!-- SINGLE ADD START -->
                   <div class="onehalf-add-shope zoom-img">
                      <a href="#"><img src="img/dep.png" alt="shope-add" /></a>
                  </div>
                  <!-- SINGLE ADD END -->
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
               <!-- SINGLE ADD START -->
               <div class="onehalf-add-shope zoom-img">
                  <a href="#"><img src="img/dep.png" alt="shope-add" /></a>
              </div>
              <!-- SINGLE ADD END -->
          </div>						
      </div>
      <!-- IMAGE-ADD-AREA END -->
  </div>
   
  <div class="row">
     <div class="col-xs-12">
        <!-- FEATURED-PRODUCTS-AREA START -->
        <div class="featured-products-area">
           <div class="left-title-area">
              <h2 class="left-title">Sản Phẩm Khuyến Mãi</h2>
          </div>
          <?php 
          $productnb = mysqli_query($conn,"SELECT * FROM product WHERE status = 1 AND sale_price > 0 ORDER BY created LIMIT 9");

          ?>
          <div class="row">
            <?php foreach ($productnb as $np) {

                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 laster-shop-item">
                    <div class="laster-thumb">
                        <img src="uploads/<?php echo $np['image'] ?>">
                        <?php if ($np['sale_price'] > 0)  :                                  
                            ?>
                            <div class="shop-icon-data">
                                <img  src="demos/sale.png" alt="sale">
                            </div>
                        <?php endif; ?>
                        <span class="tz-shop-meta">
                           <a href="chitietsp.php?id=<?php echo $np['id']; ?>" class="tzheart">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="xu-ly-gio-hang.php?id=<?php echo $np['id'];?>&action=add" class="tzshopping add-cart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>

                    </span>
                </div>
                <h6><a href=""><?php echo $np['name']; ?></a></h6>
                <?php if ($np['sale_price'] > 0) :  ?>                             
                  
                   <small><em><?php echo number_format($np['price']); ?>VND</em>
                     <?php echo number_format($np['sale_price']); ?> VND</small>
                     <?php else: ?>
                        <small><?php echo number_format($np['price']); ?>VNĐ</small>
                    <?php endif; ?>
                </div>
            <?php  } ?>

        </div>
    </div>
    <!-- FEATURED-PRODUCTS-AREA END -->
</div>						
</div>
<div class="row">
 <!-- IMAGE-ADD-AREA START -->
 <div class="image-add-area">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <!-- SINGLE ADD START -->
       <div class="onehalf-add-shope zoom-img">
          <a href="#"><img alt="shope-add" src="img/6859ae561877de2.jpg"></a>
      </div>
      <!-- SINGLE ADD END -->
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <!-- SINGLE ADD START -->
   <div class="onehalf-add-shope zoom-img">
      <a href="#"><img alt="shope-add" src="img/680316.png"></a>
  </div>
  <!-- SINGLE ADD END -->
</div>						
</div>
<!-- IMAGE-ADD-AREA END -->					
</div>
</div>
<div class="top-sellers">
    <div class="container">
        <h3>TOP - SELLERS</h3>
        <?php 
        $prodyct1 = mysqli_query($conn,"SELECT * FROM product WHERE sale_price >0 LIMIT 4  ");
        foreach ($prodyct1 as $tp): 
            ?>
            <div class="seller-grids text-center">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="chitietsp.php?id=<?php echo $tp['id']; ?>"><img src="uploads/<?php echo $tp['image'] ?>" alt=""/></a>
                    <h4 class=""><a href="chitietsp.php?id=<?php echo $tp['id']; ?>"><?php echo $tp['name']; ?></a></h4>
                    <span><?php echo $tp['id']; ?></span>
                    <p style="color: red">Giá:<?php echo number_format ($tp['price']); ?> VND</p>
                </div>
                <?php 
            endforeach;
            ?>
        </div>
    </div>
</div>

<div class="container">


</div>



<?php include('footer.php'); ?>

