<?php
class Manager_TagsController extends Zendvn_Controller_Action{
	
	private $_arrParam;
	
	private $_mainAction;
	
	protected $_currentController;
	
	protected $_paginator = array(
									'itemCountPerPage' => 5,
									'pageRange' => 3,
								  ); 
	
	public  function init()
	{
	    $this->_arrParam = $this->_request->getParams();	
        $this->loadTemplate(TEMPLATE_PATH . '/admin/system');
        
        $this->_mainAction = $this->_arrParam['module'] . '/' . $this->_arrParam['controller'] . '/index';	
	    $this->view->arrParam = $this->_arrParam; 
       
	  
	}
	
	public function indexAction()
	{
        $this->view->Title = "Administrator ::User Manager";
		$this->view->headTitle($this->view->Title,true);
		
		$country=new Manager_Model_user();
		
		
		if($this->_request->getCookie('status')==NULL){ $status=-1; } 
			 else { $status=$this->_request->getCookie('status');}
		
		if($this->_request->getPost('keyword')!=NULL){
			 $keyword=$this->_request->getParam('keyword');
			 $this->view->keyword=$keyword;
			 $listArticles = $country->searchkq($keyword,$status);
          	 $currentPage = 1;
         	 $i = $this->_getParam('page',1);
         	 if(!empty($i))
         	 {
				 $currentPage = $i;
          	 }
         	 $paginator = Zend_Paginator::factory($listArticles);
         	 $paginator->setItemCountPerPage(10)
                    ->setPageRange(5)
                    ->setCurrentPageNumber($currentPage);
         	 $this->view->paginator = $paginator;
		 } 
    	else 
         {
     	 	$listArticles = $country->get_info($status);
          	$currentPage = 1;
         	 $i = $this->_getParam('page',1);
         	 if(!empty($i))
         	 {
          	    $currentPage = $i;
          	}
         	 $paginator = Zend_Paginator::factory($listArticles);
         	 $paginator->setItemCountPerPage(15)
                    ->setPageRange(10)
                    ->setCurrentPageNumber($currentPage);
         	 $this->view->paginator = $paginator;
         	 
         	 
		}
		
	   

	}
	
	public function addAction()
	{
	 $this->view->Title = "Administrator ::User Add.";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/js/epoch_classes.js');
	 $this->view->headLink()->appendStylesheet($this->view->baseUrl().'/css/epoch_styles.css');
	 
	 $tbl_user=new Manager_Model_user();
	 
	 if($this->_request->isPost()==true)
		{	
		   $data=$this->_arrParam;
		   $tbl_user->save($data);	
	       $this->_redirect('manager/user');
		}

	}
	
	public function editAction()
	{
	 $this->view->Title = "Administrator ::User Add.";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/js/epoch_classes.js');
	 $this->view->headLink()->appendStylesheet($this->view->baseUrl().'/css/epoch_styles.css');
	 
	 
	 $tbl_user = new Manager_Model_user();
	 $id=$this->_request->getParam('id');
	
	 $data     = $tbl_user->get_data($id);
	 $this->view->data=$data;
	 if($this->_request->isPost()==true)
		{	
		   $data=$this->_arrParam;
		   $tbl_user->save($data);	
	       $this->_redirect('manager/user');
		}
    
	}
	
    public function statusAction(){
		
   $db = Zend_Registry::get('connectDb');
   $arrParam=$this->_arrParam;
   if($this->_arrParam['type'] == 'multi'){
		    
			if(count($arrParam['cid'])>0){
				$ids = implode(',', $arrParam['cid']);
				$status = ($arrParam['s'] == 0 )? 1:0;  
				$where = 'id IN (' . $ids . ')'; 
			    $db->update('users',array('published'=>$status),$where);
			}
			 }
	else 
	     {
			$status = ($arrParam['s'] == 0 )? 1:0;            
			$where ="id=$arrParam[id]";  
			$db->update('users',array('published'=>$status),$where);			
		   	 
	        }
	 $this->_redirect($this->_mainAction);
	 $this->_helper->viewRenderer->setNoRender();
	  }

    public  function deleteAction()
	{
		$res = new Manager_Model_user();
		$id=$this->_request->getParam('id');
		$res->delete_data($id);
		$this->_redirect('manager/user');
	}
	
    public function mutiAction()
	{
	    $tblsection=new Manager_Model_user();
		$tblsection->delete_muti($this->_arrParam);
		$this->_redirect('manager/user');
		$this->_helper->viewRenderer->setNoRender();
	}
	
	
}