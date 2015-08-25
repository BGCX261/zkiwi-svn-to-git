
<!--/////////////////////TOP BEGIN//////////////////////-->
        <div class="fixedmain">
        <div class="wr">
        <div class="main-search">
            <form id="search-form-home" action="#">
            <input type="text" id="searchtext" onblur="if(this.value=='') {this.value='Search anything'};" onfocus="if(this.value=='Search anything') {this.value=''};" value="Search anything" />
            <input type="submit"  id="go" value=""/>
            </form>
        </div><!--end .main-search-->
        <div class="main-menu">
          <ul>
          	  <li id="home"      onmouseover="changeClass(name='home');"      onmouseout="outClass(name='home');" ><a href="<?php //echo JURI; ?>" title="#">Trang chủ</a></li>
              <li id="question"  onmouseover="changeClass(name='question');"  onmouseout="outClass(name='question');"><a href="<?php echo JURI.'/questions'; ?>" title="#">Câu hỏi</a></li>
              <li id="tags"      onmouseover="changeClass(name='tags');"      onmouseout="outClass(name='tags');"><a href="<?php echo JURI.'/tags'; ?>" title="#">Chủ đề</a></li>
              <li id="thanhvien" onmouseover="changeClass(name='thanhvien');" onmouseout="outClass(name='thanhvien');"><a href="#" title="#">Thành viên</a></li>
          </ul>
        </div><!--end .main-menu-->
        </div><!--end wr-->
        </div><!--end fixedmain-->

<!--/////////////////////TOP END//////////////////////-->
