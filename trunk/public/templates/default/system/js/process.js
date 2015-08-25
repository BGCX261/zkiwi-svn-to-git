$(document).ready(function(){
	
	$("#cfemailAuthor").click(function(){
	   alert('DEmo');
	  });
});
function check_data(url)
    {
	
		 var nameAuthor               = document.form_register.nameAuthor.value;
		 var emailAuthor              = document.form_register.emailAuthor.value;
		 
		 var cfemailAuthor            = document.form_register.cfemailAuthor.value;
		 var user_name                = document.form_register.user_name.value;
		 var passw                    = document.form_register.passw.value;
		 
		 var cfpassw   = document.form_register.cfpassw.value;
		 var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 var error=0;
		
		 if (nameAuthor=="")
			 {
			  alert("Bạn chưa nhập tên ");
			  error=1;
			  document.form_register.nameAuthor.focus() ;
			 }
		 if ((emailAuthor=="")&&(error==0))
			 {
			  alert("Bạn chưa nhập địa chỉ email");
			  error=1;
			  document.form_register.emailAuthor.focus() ;
			 }
		 else if((regex.test(emailAuthor)==false)&&(error==0))
			 {
			  alert("Địa chỉ email không hợp lệ");
			  error=1;
			  document.form_register.emailAuthor.focus() ;
			 }
		 
		 if ((cfemailAuthor=="")&&(error==0))
			 {
			  alert("Bạn chưa confirm địa chỉ email");
			  error=1;
			  document.form_register.cfemailAuthor.focus() ;
			 }
		 else
			 {
			  
			  if((regex.test(cfemailAuthor)==false)&&(error==0)) {
					alert("Email confirm không hợp lệ");
					error=1;
					document.form_register.cfemailAuthor.focus() ;
				}
			  else{
				  if ((emailAuthor!=cfemailAuthor)&&(error==0)){
				      alert("Dia chi email confirm không  giống");	
				      error=1;
				      document.form_register.cfemailAuthor.focus() ;
			   }
			  }
			 }
		 
		 if ((user_name=="")&&(error==0))
		 {
		      alert("Bạn chưa nhập tên đăng nhập");
		      error=1;
		      document.form_register.user_name.focus() ;
		 }
		 
		 if ((passw=="")&&(error==0))
			 {
			  alert("Bạn chưa nhập mật khẩu");
			  error=1;
			  document.form_register.passw.focus() ;
			 }
		 
		 if ((cfpassw=="")&&(error==0))
		    {
		     alert("Bạn chưa confirm mật khẩu");
		     error=1;
		     document.form_register.cfpassw.focus() ;
		     }
		 else
			 { 
			 if (cfpassw!=passw)
			    {
				  alert("Mật khẩu confirm chưa chính xác");
				  error=1;
				  document.form_register.cfpassw.focus() ;
				 }
			 }
		 
		 if(error==0)
		{
			
			 document.form_register.action = url;
			 document.form_register.submit();
		}
		 
		
	
	}

function changeClass(name)
    {
	   var id=name;
	   document.getElementById(id).className= "acti";
	}
function outClass(name)
   {  
	   var id=name;
	   document.getElementById(id).className = "";
   }

function check_ask(url)
   {
	var ask_title                 = document.enterquestion.ask_title.value;
	var description               = document.enterquestion.tomtat.value;
	var tag_values                = document.enterquestion.tag_values.value;
	var nameAuthor                = document.enterquestion.nameAuthor.value;
	var namelogin                 = document.enterquestion.namelogin.value;
	var emailAuthor               = document.enterquestion.emailAuthor.value;
	var cfemailAuthor             = document.enterquestion.cfemailAuthor.value;
	var passw                     = document.enterquestion.passw.value;
	var cfpassw                   = document.enterquestion.cfpassw.value;
	
	var regex                     = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var error=0;
	
	if (ask_title=='') 
	{
		alert('Bạn chưa nhập tiêu đề câu hỏi');
		document.enterquestion.ask_title.focus();
		 
		document.enterquestion.ask_title.style.border="1px solid #F00";
		 
    }
	else if(tag_values=='')
	{
		alert('Bạn chưa chọn thể loại câu hỏi');
		document.enterquestion.tag_values.focus();
		 
	}
	else if(nameAuthor=='')
	{
		alert('Bạn chưa nhập họ tên');
		document.enterquestion.nameAuthor.focus();
		document.enterquestion.nameAuthor.style.border="1px solid #F00";
    }
	else if(namelogin=='')
	{
		alert('Bạn chưa nhập tên đăng nhập');
		document.enterquestion.namelogin.focus();
		document.enterquestion.namelogin.style.border="1px solid #F00";
    }
	else if(emailAuthor=='')
	{
		alert('Bạn chưa nhập địa chỉ email');
		document.enterquestion.emailAuthor.focus();
		document.enterquestion.emailAuthor.style.border="1px solid #F00";
   }
	else if(regex.test(emailAuthor)==false)
	{ 
		alert('Địa chỉ email không phù hợp');
		document.enterquestion.emailAuthor.focus();
		document.enterquestion.emailAuthor.style.border="1px solid #F00";
	}
	else if(cfemailAuthor=='')
	{
		alert('Bạn chưa conform email');
		document.enterquestion.cfemailAuthor.focus();
		document.enterquestion.cfemailAuthor.style.border="1px solid #F00";
	}
	else if(emailAuthor!=cfemailAuthor)
	{
		alert('Địa chỉ email conform không giống địa chỉ email');
		document.enterquestion.cfemailAuthor.focus();
		document.enterquestion.cfemailAuthor.style.border="1px solid #F00";
    }
	else if(passw=='')
	{
		alert('Bạn chưa nhập mật khẩu');
		document.enterquestion.passw.focus();
		document.enterquestion.passw.style.border="1px solid #F00";
    }
	else if(cfpassw=='')
	{
		alert('Bạn chưa conform mật khẩu');
		document.enterquestion.cfpassw.focus();
		document.enterquestion.cfpassw.style.border="1px solid #F00";
	}
	else if(cfpassw!=passw)
	{
		alert('Mật khẩu conform không hợp lệ');
		document.enterquestion.cfpassw.focus();
		document.enterquestion.cfpassw.style.border="1px solid #F00";
	}
	else
		{
		 document.enterquestion.action=url;
		 document.enterquestion.submit();
		}
		
	
   }

function check()
{
  alert('dnskdv');	
}
