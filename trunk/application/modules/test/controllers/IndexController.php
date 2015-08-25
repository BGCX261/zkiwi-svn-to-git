<?php
class Test_IndexController extends Zendvn_Controller_Action{
    
	private $_arrParam;
	public function init(){
	 $this->_arrParam = $this->_request->getParams();	
     $this->loadTemplate(TEMPLATE_PATH . '/admin/login');
     
	}

	
	public function indexAction()
	{
	  $tbl_check = new Test_Model_index();
	  $data      = $tbl_check->get_cat();
	   $menu = array();
       
       for($i=0;$i<count($data);$i++){
         $menu[]=$data[$i];   	
       }
      $newMenu = array();
      $result  = $tbl_check-> get_content($menu,0,1,$newMenu);
      
      $this->view->data=$result;
      
   
	}
	
   
}
?>