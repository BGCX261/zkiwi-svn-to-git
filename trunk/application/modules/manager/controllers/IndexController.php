<?php
class Manager_IndexController extends Zendvn_Controller_Action{
    
	private $_arrParam;
	public function init(){
	 $this->_arrParam = $this->_request->getParams();	
     $this->loadTemplate(TEMPLATE_PATH . '/admin/login');
     
	}
	
	public function indexAction()
	{
	   		
		$login= $this->_request->getPost('login');
			
		 if($this->_request->isPost()==true){
			 	$user = $this->_request->getPost('username');
			    $pass= md5($this->_request->getPost('passwd'));
			   
               
			    $tbluser = new Manager_Model_checkuser();
			    $row=$tbluser->check($user,$pass);
                
			   
	        if (count($row)>0)
	               {
	                $ns = new Zend_Session_Namespace('login');        
			        $ns->user =$user;
			        $ns->id   =	$row[0]['id'];    
	                $this->_redirect('manager/index/controlpanel');
	      
	               }
	            else 
	              {
	              	$this->view->error="Username and password do not match";
	              }   
			 	}

	
	}
	
    public function controlpanelAction()
	{
          
	
	}
}
?>