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
        $this->view->Title = "Tags Manager";
		$this->view->headTitle($this->view->Title,true);
		
		$tags=new Manager_Model_tags();
		
	
		if($this->_request->getCookie('status')==NULL){ $status=-1; } 
			 else { $status=$this->_request->getCookie('status');}
		
		if($this->_request->getCookie('keyword')!=Null){
			
			 $keyword=$this->_request->getCookie('keyword');
			 $this->view->keyword=$keyword;
			 
			 $listArticles = $tags->searchkq($keyword,$status);
          	 $currentPage = 1;
         	 $i = $this->_getParam('page',1);
         	 if(!empty($i))
         	 {
				 $currentPage = $i;
          	 }
         	 $paginator = Zend_Paginator::factory($listArticles);
         	 $paginator->setItemCountPerPage(45)
                    ->setPageRange(5)
                    ->setCurrentPageNumber($currentPage);
         	 $this->view->paginator = $paginator;
         	 
		 } 
    	else 
        {
     	 	$listArticles = $tags->listItemabout($status);
     	 	
         	$currentPage = 1;
         	 $i = $this->_getParam('page',1);
         	 if(!empty($i))
         	 {
          	    $currentPage = $i;
          	}
         	 $paginator = Zend_Paginator::factory($listArticles);
         	 $paginator->setItemCountPerPage(45)
                    ->setPageRange(10)
                    ->setCurrentPageNumber($currentPage);
         	 $this->view->paginator = $paginator;
         	 
        }
	
	}
	
	public function addAction()
	{
	 $this->view->Title = "Tags Manager :[Add].";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	 
	 $tbl_user=new Manager_Model_tags();
	 
	 if($this->_request->isPost()==true)
		{	
		   $data=$this->_arrParam;
		   $tbl_user->save($data);	
	       $this->_redirect('manager/tags');
		}

	}
	
	public function editAction()
	{
	 $this->view->Title = "Tags Manager ::[Edit]";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	 
	 
	 $tbl_tags = new Manager_Model_tags();
	 $id=$this->_request->getParam('id');
	
	 $data     = $tbl_tags->getrow($id);
	 
	 $this->view->data=$data;
	 if($this->_request->isPost()==true)
		{	
		   $data=$this->_arrParam;
		   $tbl_tags->save($data);	
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
			    $db->update('tags',array('published'=>$status),$where);
			}
			 }
	else 
	     {
			$status = ($arrParam['s'] == 0 )? 1:0;            
			$where ="id=$arrParam[id]";  
			$db->update('tags',array('published'=>$status),$where);			
		   	 
	        }
	 $this->_redirect($this->_mainAction);
	 $this->_helper->viewRenderer->setNoRender();
	  }

    public  function deleteAction()
	{
		$res = new Manager_Model_tags();
		$id=$this->_request->getParam('id');
		$res->delete_data($id);
		$this->_redirect('manager/tags');
	}
	
    public function mutiAction()
	{
	    $tblsection=new Manager_Model_tags();
		$tblsection->delete_muti($this->_arrParam);
		$this->_redirect('manager/tags');
		$this->_helper->viewRenderer->setNoRender();
	}
	
	
}