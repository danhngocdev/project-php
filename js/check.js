$(document).ready(function(){
 $("#fromdangky").click().validate({
  rules:{
  	name:{
  		required:true,
  		minlength:6,
      text:true,
  	},
  	email:{
  		required:true,
        email:true,
  	},
  	address:{
	     required:true,
	     minlength:6,
  	},
  	phone:{
	    required:true,
	     minlength:10,
       maxlength:11,

  	},
  	password:{
	    required:true,
	  	minlength:6,
      maxlength: 32,
  	},
    gender:{
      required:true,
    },
  	password2:{
  		required:true,
  		minlength:6,
    	equalTo: "#password"
  	},

  },
  messages:{
  	name:{
  		required:"Vui Lòng Nhập Họ Tên",
  		minlength:"Họ Tên Phải Đúng Không Được Ngắn",
  	},
    address:{
      required:"Vui Lòng Nhập Địa Chỉ",
    },
  	email:{
		  	required:"Vui Lòng Nhập Email",
		    email:"Vui lòng nhập Email Đúng Định Dạng",	
  	},
   phone: {
							required: "Vui lòng nhập số điện thoại",
							minlength: "Số máy quý khách vừa nhập là số không có thực"
						},
	password: {
							required: 'Vui lòng nhập mật khẩu',
							minlength: 'Vui lòng nhập ít nhất 6 kí tự'
						},					
   password2: {
							required: 'Vui lòng nhập mật khẩu',
							minlength: 'Vui lòng nhập ít nhất 6 kí tự',
							equalTo: 'Mật khẩu không trùng'
						},
  gender:{
  required:"Vui Lòng Chọn Giới Tính",
  },         
  }
 });
$("#tzlogin").validate({
rules:{
    email:{
     required:true,
  },
  password:{
       required:true,
  }
},
  messages:{
    email:{
      required:'Vui Lòng Nhập Email'
    },
    password:{
     required:'Vui Lòng Nhập Password'
    },
  },
});
$("#feedback").validate({
  rules:{
    fullname:{
     required:true,
     minlength:16,
  },
  email:{
       required:true,
       email:true,
  },
    phone:{
      required:true,
      minlength:10,
      maxlength:11,

    },
    object:{
      required:true,
    },
    message:{
required:true,
    }
},
  messages:{
    fullname:{
      required:'Vui Lòng Nhập Họ Tên',
      minlength:"Họ Tên Phải Đúng Không Được Ngắn",
    },
    email:{
         required:"Vui Lòng Nhập Email",
        email:"Vui lòng nhập Email Đúng Định Dạng", 
    },
     phone: {
              required: "Vui lòng nhập số điện thoại",
               minlength: "Số máy quý khách vừa nhập là số không có thực"
            },
            object: {
              required: "Vui lòng nhập Đối tượng",
            },
             message: {
              required: "Vui lòng nhập Yêu Cầu",
            },

  },
});

}); 
