<?php 
     $tbl_ask = new Ask_Model_ask();
     $ask     = $tbl_ask-> get_tags();
?>
<script>
  $(function(){
    var data = {items: [
    <?php foreach ($ask as $val_ask){ ?>                    
        {value: "<?php echo $val_ask['id']; ?>", name: "<?php echo $val_ask['title']; ?>"},
    <?php }?>
    
]};
$("input#tagsp").autoSuggest(data.items, {selectedItemProp: "name", searchObjProps: "name"});
  });
  </script>

<!--/////////////////////MAIN BEGIN//////////////////////-->
<div class="main">
<div class="catform"><span class="gra">Đặt câu hỏi</span></div>
	<div class="wrapmain">
    <div class="left-column">
    	<div class="beforetips">
        	<a class="hidetips" href="#" title="Ẩn/Hiện mẹo post câu hỏi"><span>Đặt câu hỏi</span></a>
            <a class="showtips" href="#" title="Ẩn/Hiện mẹo post câu hỏi"><span>Đặt câu hỏi</span></a>
        
            <div class="tipscontent">
            	<p>Để nhanh chóng trong việc tìm kiếm câu trả lời hay giải đáp cho vấn đề của bạn, chúng tôi đưa ra vài khuyến nghị cho bạn.</p>
            </div><!--end tipscontent-->
            <div class="clear"></div>
        </div><!--end beforetips-->
         <form action="<?php echo JURI.'/ask/index'; ?>" name="enterquestion"  id="enterquestion" method="post">
        <div class="ask-content">
        	<div id="wmd-editor" class="wmd-panel">
        	 
            	<div class="ttpost">
                    <label for="title">Tiêu đề</label>
                    <input  type="text" value="<?php echo $this->arrParam['title']; ?>" name="ask_title" id="ask_title" />
                    <span class="tiptt">Câu hỏi của bạn. Ví dụ: <strong>Làm cách nào để xóa mật khẩu đã lưu trên trình duyệt web?</strong></span>
                </div><!--end ttpost-->
            	<div id="wmd-button-bar"></div>
                <div class="inarea">
	               <textarea id="wmd-input" class="resizable" rows="10" name="tomtat" >
	                    <?php echo $this->arrParam['tomtat']; ?>
	               </textarea>
               <span class="tipare">Nội dung câu hỏi. Ví dụ: <strong>Tôi có đăng nhập vào tài khoản email ở tiệm internet công cộng và lỡ lưu mật khẩu vào trình duyệt, giờ tôi muốn xóa mật khẩu đã lưu trên trình duyệt thì phải làm sao? Chân thành cảm ơn!</strong></span>
               </div><!--end inarea-->
            </div><!--end wmd-panel-->
              <div id="wmd-preview" class="wmd-panel"></div>
              <div id="wmd-output" class="wmd-panel"></div>
              
              <div class="setpoints">
              <h4>Treo thưởng: <span>Chức năng chỉ hiển thị khi số điểm danh vọng của bạn > 100</span></h4>
                <div class="checker">
                  <label>
                    <input disabled="disabled" checked="checked" type="radio" name="setpoints" value="0" id="setpoints_0" />
                    Không</label>
                  <label>
                    <input disabled="disabled" type="radio" name="setpoints" value="1" id="setpoints_1" />
                    20 điểm</label>
                  <label>
                    <input disabled="disabled" type="radio" name="setpoints" value="2" id="setpoints_2" />
                    30 điểm</label>
                  <label>
                    <input disabled="disabled" type="radio" name="setpoints" value="3" id="setpoints_3" />
                    40 điểm</label>
                  <label>
                    <input disabled="disabled" type="radio" name="setpoints" value="4" id="setpoints_4" />
                    50 điểm</label>
                  <label>
                    <input disabled="disabled" type="radio" name="setpoints" value="5" id="setpoints_5" />
                    100 điểm</label>
                </div><!--end checker-->
                <div class="clear"></div>
              </div><!--end setpoints-->
            <div class="tagspost">
                    <div class="tagtip"><strong>Chủ đề:</strong> <span class="tiptag">Ví dụ: <strong>trình duyệt, mật khẩu, password...</strong> Tối đa 5 chủ đề, ưu tiên chọn những chủ đề có sẵn, cách nhau bằng dấu "<strong>,</strong>"(phảy)</span></div>
                    <input id="tagsp" type="text"  name="tags" value=""/>
                    
                </div><!--end tagspost-->
              <div class="subpost">
                  <div class="userops">Điền thông tin đăng ký nhanh chóng và đăng câu hỏi của bạn hoặc <a href="#" class="op02" title="Đăng nhâp">đăng nhập</a> nếu là thành viên</div>
                  <div class="quickpost">
                      <p>
                         <label for="nameAuthor">Tên của bạn</label>
                         <input type="text" id="nameAuthor" name="nameAuthor" value="<?php echo $this->arrParam['nameAuthor']; ?>" />
                      </p>
                       <p>
                          <label for="emailAuthor">Tên đăng nhập</label>
                          <input type="text" id="namelogin" name="namelogin" value="<?php echo $this->arrParam['namelogin']; ?>"/>
                      </p>
                      <p>
                          <label for="emailAuthor">Email</label>
                          <input type="text" id="emailAuthor" name="emailAuthor" value="<?php echo $this->arrParam['emailAuthor']; ?>"/>
                      </p>
                      <p>
                          <label for="cfemailAuthor">Xác nhận email</label>
                          <input type="text" id="cfemailAuthor" name="cfemailAuthor" value="<?php echo $this->arrParam['cfemailAuthor']; ?>"/>
                      </p>
                      <p>
                          <label for="passw">Mật khẩu</label>
                          <input type="password" id="passw" onblur="if(this.value=='') {this.value='mật khẩu'};" onfocus="if(this.value=='mật khẩu') {this.value=''};" value="<?php echo $this->arrParam['passw']; ?>" name="passw" />
                      </p>
                      <p>
                           <label for="cfpassw">Xác nhận mật khẩu</label>
                           <input type="password" id="cfpassw" onblur="if(this.value=='') {this.value='mật khẩu'};" onfocus="if(this.value=='mật khẩu') {this.value=''};" value="<?php echo $this->arrParam['cfpassw']; ?>" name="cfpassw" />
                      </p>
                  </div><!--end quickpost-->
                  <div class="subquick">
                       <input id="quicksub" type="button" value="Đăng câu hỏi"  onclick="check_ask('<?php echo JURI.'/ask/index'; ?>');" />
                  </div>
                  <div class="clear"></div>
              </div><!--end subpost-->
      
         <div class="clear"></div>
       </div><!--end ask-content-->
     </form>
    </div><!--end .left-column-->
   