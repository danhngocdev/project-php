$('.add-category').click(function(e){
  $.ajax({
    url:'modules/category/them.php',
    type:'POST',
    dataType:'json',
    data:{
      name:$('#cat_name').val()
    },
    success:function(res){
     
     $('#list').load(location.href + ' #list>*');
     $('#modal-message .modal-title').html(res.msg);
     $('#modal-message').modal();
    }

  });
});