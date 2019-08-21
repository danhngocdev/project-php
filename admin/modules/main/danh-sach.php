 
 <style>
   .info-box {
  min-height: 140px;
  margin-bottom: 30px;
  padding: 20px;
  color: white;
  -webkit-box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
}
.info-box i {
  display: block;
  height: 100px;
  font-size: 60px;
  line-height: 100px;
  width: 100px;
  float: left;
  text-align: center;
  margin-right: 20px;
  padding-right: 20px;
  color: rgba(255, 255, 255, 0.75);
}
.info-box .count {
  margin-top: 20px;
  font-size: 34px;
  font-weight: 700;
}
.info-box .title {
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 600;
}
.info-box .desc {
  margin-top: 10px;
  font-size: 12px;
}
.info-box.danger {
  background: #ff5454;
  border: 1px solid #ff2121;
}
.info-box.warning {
  background: #fabb3d;
  border: 1px solid #f9aa0b;
}
.info-box.primary {
  background: #20a8d8;
  border: 1px solid #1985ac;
}
.info-box.info {
  background: #67c2ef;
  border: 1px solid #39afea;
}
.info-box.success {
  background: #79c447;
  border: 1px solid #61a434;
}
.blue-bg {
  color : #fff;
  background : #57889c;
  background-color : #57889c;
}
.count {
  margin-top: 20px;
  font-size: 34px;
  font-weight: 700;
}
.brown-bg {
  color : #fff;
  background : #d1b993;
  background-color : #d1b993;
}
.dark-bg {
  color : #fff;
  background : #1a2732;
  background-color : #1a2732;
  }
  .green-bg {
    background: #4cd964;
}
.title {
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 600;
}


  <?php 
  $sp = "SELECT COUNT(*) as 'dem' FROM product";
  $dem = mysqli_query($conn,$sp);
  $dem1 = mysqli_fetch_assoc($dem);
  $khachhang = mysqli_query($conn,"SELECT COUNT(*) as 'dem' FROM customer");
  $res= mysqli_fetch_assoc($khachhang);
  $donhang = mysqli_query($conn,"SELECT COUNT(*) as 'dem' FROM orders");
   $res1= mysqli_fetch_assoc($donhang);
  $feedback = mysqli_query($conn,"SELECT COUNT(*) as 'dem' FROM feedback ");
 $feed = mysqli_fetch_assoc($feedback);
  

  ?>
/*----------------  color------------------------*/
 </style><!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thống Kê Chi Tiết
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="glyphicon glyphicon-user"></i>
            <div class="count"><?php echo $res['dem']; ?></div>
            <div class="title">Thành Viên</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box brown-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count"><?php echo $res1['dem']; ?></div>
            <div class="title">Đơn Hàng</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="glyphicon glyphicon-folder-open"></i>
            <div class="count"><?php  echo  $dem1['dem']; ?></div>
            <div class="title">Sản Phẩm</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="glyphicon glyphicon-pencil"></i>
            <div class="count"><?php echo  $feed['dem']; ?></div>
            <div class="title">Phản Hồi Khách Hàng</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
      </div><!--/.row-->
    </section>