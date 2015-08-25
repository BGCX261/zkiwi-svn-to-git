<div class="overlaybody"></div>
		<div class="user-box log-box">
			<div class="box-wr">
		             	<a class="boxclose" href="#" title="Đóng">Đóng</a>
		                <h2>Đăng nhập</h2>
		             	<form id="toplog" action="#">
		                <p><input id="toppass" type="password" onblur="if(this.value=='') {this.value='mật khẩu'};" onfocus="if(this.value=='mật khẩu') {this.value=''};" value="mật khẩu" />
		                <input id="topuser" type="text" onblur="if(this.value=='') {this.value='Email'};" onfocus="if(this.value=='Email') {this.value=''};" value="Email" />
		                </p>
		                <p><input id="topsub" type="submit" value="Đăng nhập" /><a href="#" title="Lấy lại mật khẩu" class="getpass">Quên mật khẩu?</a></p>
		             </form>
			</div><!--end box-wr-->
		</div><!--end log-box-->
		
		<div class="user-box reg-box">
			<div class="box-wr">
		             	<a class="boxclose" href="#" title="Đóng">Đóng</a>
		                <h2>Đăng ký nhanh chóng với chưa đầy 1 phút</h2>
		             	<form name="form_register" id="toplog" action="<?php echo JURI.'index/register'; ?>"  method="post">
		                    <p><label for="nameAuthor">Tên của bạn</label><input type="text" id="nameAuthor" name="nameAuthor" /></p>
		                    <p><label for="emailAuthor">Email</label><input type="text" id="emailAuthor" name="emailAuthor"/></p>
		                    <p><label for="cfemailAuthor">Xác nhận email</label><input type="text" id="cfemailAuthor" name="cfemailAuthor"/></p>
		                    <p><label for="cfemailAuthor">Tên đăng nhập</label><input type="text" id="user_name" name="user_name"/></p>
		                    <p><label for="passw">Mật khẩu</label><input name="passw" type="password" id="passw" onblur="if(this.value=='') {this.value='mật khẩu'};" onfocus="if(this.value=='mật khẩu') {this.value=''};" value="mật khẩu" /></p>
		                    <p><label for="cfpassw">Xác nhận mật khẩu</label><input name="cfpassw" type="password" id="cfpassw" onblur="if(this.value=='') {this.value='mật khẩu'};" onfocus="if(this.value=='mật khẩu') {this.value=''};" value="mật khẩu" /></p>
		                    <p><input id="regsub" type="button" value="Đăng ký" onclick="check_data('<?php echo JURI.'/index/register'; ?>')" /></p>
		             </form>
			</div><!--end box-wr-->
		</div><!--end log-box-->
		
<!--/////////////////////TOP BEGIN//////////////////////-->
        <div class="fixedmain">
        	
			<div class="wr">
            <div class="main-search">
                <form id="search-form-home" action="#">
                <input type="text" id="searchtext" onblur="if(this.value=='') {this.value='Search anything'};" onfocus="if(this.value=='Search anything') {this.value=''};" value="Search anything" />
                <input type="submit"  id="go" value=""/>
                </form>
            </div><!--end .main-search-->
            <div class="login-top">
                <ul>
                    <li><a class="logopen" href="#" title="Đăng nhập">Đăng nhập</a></li>
                    <li><a class="regopen" href="#" title="Đăng ký">Đăng ký</a></li>
                </ul>
            </div><!--end .login-top-->
            
   
            <div class="main-menu">
              <ul>
                  <li id="home"      onmouseover="changeClass(name='home');"      onmouseout="outClass(name='home');" ><a href="<?php echo JURI; ?>" title="#">Trang chủ</a></li>
                  <li id="question"  onmouseover="changeClass(name='question');"  onmouseout="outClass(name='question');"><a href="<?php echo JURI.'/questions'; ?>" title="#">Câu hỏi</a></li>
                  <li id="tags"      onmouseover="changeClass(name='tags');"      onmouseout="outClass(name='tags');"><a href="<?php echo JURI.'/tags'; ?>" title="#">Chủ đề</a></li>
                  <li id="thanhvien" onmouseover="changeClass(name='thanhvien');" onmouseout="outClass(name='thanhvien');"><a href="#" title="#">Thành viên</a></li>
              </ul>
            </div><!--end .main-menu-->
            </div><!--end .wr-->
        </div><!--end fixedmain-->
    
    <div class="main-sec">
    	<a class="logo" href="#"><h2>Boxask.com</h2></a><!--end .logo-->
        <a class="topbtn button" href="<?php echo JURI.'/ask'; ?>">Đặt câu hỏi</a>
    </div><!--end .main-sec--> 
    <div class="clear"></div>
<!--/////////////////////TOP END//////////////////////-->