<?php
class Questions_IndexController extends  Zendvn_Controller_Action{
	
	private $_arrParam;
	private $_mainAction;
	protected $_currentController;
	
	public function init(){
		
	 	
	    $this->_arrParam = $this->_request->getParams();	
		$this->loadTemplate(TEMPLATE_PATH . '/default/system');
		$this->_mainAction = $this->_arrParam['module'] . '/' . $this->_arrParam['controller'] . '/index';	
	    $this->view->arrParam = $this->_arrParam; 
	    
	   
    
	}
	
    public function indexAction(){


    }
   
    public function registerAction(){
        $tbl_register        = new Default_Model_register();
        $tbl_register        ->register_save( $this->_arrParam);
        echo "<script>alert('Đăng ký thành công')</script>";
        
        $this->_redirect($this->_mainAction);
        $this->_helper->viewRenderer->setNoRender();
    }
     
    
}