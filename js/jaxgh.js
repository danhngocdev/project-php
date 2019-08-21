// Thêm sản phẩm vào giỏ
$(document).ready(function(){
	$('.add-cart').click(function(e){
		e.preventDefault(); 
		// alert(2121);
		 var url = $(this).attr('href');
		 $.ajax({
          url:url,
          type:'GET',
          dataType:'json',
          success:function(res){
          	// alert(2121);
          	console.log(res);
               $('.ajax-cart-quantity').html(res.tong_so_luong);
          	$('#modal-msg .modal-title').html(res.msg);
             $('#hienthisp').load(location.href + ' #hienthisp');
               $('#cart-mini').load(location.href + ' #cart-mini'); // laod lại div có id là #cart-mini
                  $('.ajax-cart-quantity').load(location.href + ' .ajax-cart-quantity') 
          	$('#modal-msg').modal();
                             
          }
		 });
	});
// giảm số lượng giỏ hàng
 $(document).on('click','.qty-minus',function(){
  var id = $(this).data('id');
  var qty = parseInt($('#quan-'+id).val());
  var new_qty = qty-1;
  $('#quan-'+id).val(new_qty);
  
 });
 // tắng số lượng 
  $(document).on('click','.qty-flus',function(){
  var id = $(this).data('id');
  var qty = parseInt($('#quan-'+id).val());
  var new_qty = qty+1;
  $('#quan-'+id).val(new_qty);
  
 });
  // cập nhập giỏ hàng
     $(document).on('click','.update-item',function(){
      var id = $(this).data('id');
      var qty = $('#quan-'+id).val();
      var url = 'xu-ly-gio-hang.php?id='+id+'&quantity=+'+qty+'&action=update';
         $.ajax({
          url:url,
          type:'GET',
          // dataType:'json',
          success:function(res){
             $('.ajax-cart-quantity').html(res.tong_so_luong);
              $('#cart-mini').load(location.href + ' #cart-mini'); // laod lại div có id là #cart-mini
              $('#total-price').load(location.href + ' #total-price');
              // $('#loadprice').load(location.href + ' #loadprice'); k có gì
               $('#cart-summary').load(location.href + ' #cart-summary>*');
               $('#hienthisp').load(location.href + ' #hienthisp');
               $('.ajax-cart-quantity').load(location.href + ' .ajax-cart-quantity');
               $('#pricett').load(location.href + ' #pricett>*');
            
                                        
          }
     });

     });
     $(document).on('click','.cart_quantity_delete',function(e){
      e.preventDefault();
      var url = $(this).attr('href');
         $.ajax({
          url:url,
          type:'GET',
           dataType:'json',
          success:function(res){
             $('.ajax-cart-quantity').html(res.tong_so_luong);
              $('#cart-mini').load(location.href + ' #cart-mini'); // laod lại div có id là #cart-mini
              $('#total-price').load(location.href + ' #total-price');
              $('#cart-summary').load(location.href + ' #cart-summary');
              $('#hienthisp').load(location.href + ' #hienthisp');
              $('.ajax-cart-quantity').load(location.href + ' .ajax-cart-quantity');
              
              
                                        
          }
     });

     });
});

