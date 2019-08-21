 <section class="header-bottom-area">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <!-- MAIN-SLIDER-AREA START -->
            <?php 
            $banner = mysqli_query($conn,"SELECT  name,link,image FROM banner WHERE status = 1 ORDER BY order_link ASC");

            ?>
            <div class="main-slider-area">
                <div class="slider-area">
                    <div id="wrapper">
                        <div class="slider-wrapper">

                            <div id="mainSlider" class="nivoSlider">
                                <?php foreach ($banner as$c => $ban) {
                                  ?>
                                  <img src="uploads/<?php echo $ban['image']; ?>" alt="main slider" class="<?php if($c==0) echo'active' ?>"/>
                              <?php } ?>
                          </div>
                                    </div>
                                </div>                              
                            </div>                                          
                        </div>  
                        <!-- MAIN-SLIDER-AREA END -->
                    </div>  
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <?php 
                         $banner1 = mysqli_query($conn,"SELECT  name,link,image FROM banner WHERE status = 1 ORDER BY order_link ASC LIMIT 3");
                        foreach ($banner1 as $ban) {
                           ?>
                           <img src="uploads/<?php echo $ban['image']; ?>" alt="">
                       <?php } ?>
                   </div>                    
               </section>