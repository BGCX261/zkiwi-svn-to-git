<?php
class Ask_IndexController extends  Zendvn_Controller_Action{
	
	private $_arrParam;
	private $_mainAction;
	protected $_currentController;
	
	public function init(){
		
	 	
	    $this->_arrParam = $this->_request->getParams();	
		$this->loadTemplate(TEMPLATE_PATH . '/default/system');
		$this->_mainAction = $this->_arrParam['module'] . '/' . $this->_arrParam['controller'] . '/index';	
	    $this->view->arrParam = $this->_arrParam; 
	}
	
    public function indexAction()
    {
      if($this->_request->isPost()==true)
		{
			$data    = $this->_arrParam;
			$tag= explode(",",$data['tag_values']);
			
			
			/*$tbl_ask = new Ask_Model_ask();
			$ns= new Zend_Session_Namespace();
			if ($ns->id>0){
			    $tbl_ask-> save($data,$user_id=$ns->id);
			}
			else 
			{
			     $tbl_ask->save_user($data);
			     
			}
			*/
			
			 
			
			print_r($tag);
			// $this->_redirect('questions');
		}
     
   }
     
    
}