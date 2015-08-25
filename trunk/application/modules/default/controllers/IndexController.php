<?php
class IndexController extends  Zendvn_Controller_Action{
	
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
	    
	    if($this->_request->isPost()==true)
		{
			$user = $this->_request->getPost('username');
			$pass= md5($this->_request->getPost('passwd'));
			   
               
			$tbluser = new Manager_Model_checkuser();
	        $row=$tbluser->check($user,$pass);
	        
		    if (count($row)>0)
	               {
	                $ns = new Zend_Session_Namespace('login');        
			        $ns->user =$user;
			        $ns->id   =	$row[0]['id'];    
	                $this->_redirect('index');
	      
	               }
	          else 
	          {
	                $this->_redirect('index/login');
	          }
	          
		}
			
	    $ns = new Zend_Session_Namespace('login');
	    if (isset($ns->id)==false)
	    {
	     $this->_redirect('index/login');
	    }
	     
    }
   
    public function registerAction(){
        $tbl_register        = new Default_Model_register();
        $tbl_register        ->register_save( $this->_arrParam);
        echo "<script>alert('Đăng ký thành công')</script>";
        
        $this->_redirect($this->_mainAction);
        $this->_helper->viewRenderer->setNoRender();
    }
    
    public function loginAction(){
       
    }
     
    
}