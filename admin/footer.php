 <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<script src="tinymce/tinymce.min.js"></script>
<script src="tinymce/config.js"></script>
<script src="js/function.js"></script>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"s></script>
<script src="js/jaxx.js"></script>
<script>
  function hien_thi_anh(file){
    // alert(1234);
    if (file.files[0].name) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#show_img').attr('src',e.target.result);
      }
      reader.readAsDataURL(file.files[0]);
    }
  }
  function them_anh_khac(){
 var more_img = ' <input type="file" name="image_orther[]" >';
 $('#more_img').append(more_img);
    
  }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable({
      "language": {
            "lengthMenu": "Xem _MENU_ Sản Phẩm",
            "zeroRecords": "Không tìm thấy dòng nào phù hợp",
            "info": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ Sản Phẩm",
            "infoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "infoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix":  "",
            "sSearch":       "Tìm Kiếm Sản Phẩm:",
            "sUrl":          "",
              "paginate": {
        // "first":      "Trước ",
        // "last":       "Sau",
        "next":       "Tiến",
        "previous":   "Trước"
    },
          
        }
       
      
    });
});
</script>
   </body>
</html>
