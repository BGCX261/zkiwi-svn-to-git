<?php
class Manager_GroupUserController extends Zendvn_Controller_Action{
	
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
       
	    $ns = new Zend_Session_Namespace('login'); 
	  
	    if(($ns->id)<1) 
	      {
	      $this->_redirect('manager/');
	      }      
	    
	   
	}
	
	public function indexAction()
	{
        $this->view->Title = "Group User Manager";
		$this->view->headTitle($this->view->Title,true);
		
		$tbl_group = new Manager_Model_group();
		
		if($this->_request->getPost('keyword')!=NULL){
				 $keyword=$this->_request->getParam('keyword');
				 $this->view->keyword=$keyword;
	             $listArticles = $tbl_group->searchkq($keyword);
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
	     	 	$listArticles = $tbl_group->get_info();
	          	$currentPage = 1;
	         	 $i = $this->_getParam('page',1);
	         	 if(!empty($i))
	         	 {
	          	    $currentPage = $i;
	          	}
	         	 $paginator = Zend_Paginator::factory($listArticles);
	         	 $paginator->setItemCountPerPage(45)
	                    ->setPageRange(45)
	                    ->setCurrentPageNumber($currentPage);
	         	 $this->view->paginator = $paginator;
			}
			
			
   }
	
    public function addAction()
	{
	  $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	  $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	  
	  $this->view->Title = "Group User Manager [Add]";
	  $this->view->headTitle($this->view->Title,true);
	  $tbl_group  = new  Manager_Model_group();
	  
		 if($this->_request->isPost()==true)
			{	
			   $data      =$this->_arrParam;
			   if ($data['title']=='')
			   {
			   	  $error=1;
			      $this->view->error  ='Bạn chưa nhập tên loại tin';
			   }
			   
			 if (empty($error)==true)
			    {
			     
			    	$tbl_group->save($data);	
		            $this->_redirect('manager/group-user');	
			    }
			}
	}
   
    public function editAction()
	{
	  $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	  $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	  
	  $this->view->Title = "Group User Manager [Edit]";
	  $this->view->headTitle($this->view->Title,true);
	  
	  $tbl_group = new Manager_Model_group();
	  $id=$this->_request->getParam('id');
	  $result=$tbl_group->getrow($id);
	  $this->view->data=$result;
	  
	  if ($this->_request->isPost())  
		  {
		  	$data=$this->_arrParam;
			$tbl_group->save($data);	
			$this->_redirect('manager/group-user');	
		  } 
    
	}

    public  function deleteAction()
	{
		$res = new Manager_Model_group();
		$id=$this->_request->getParam('id');
		$res->delete_data($id);
	    $this->_redirect('manager/group-user');	
	}
	
    public function mutiAction()
	{
	    $tblsection=new Manager_Model_group();
		$tblsection->delete_muti($this->_arrParam);
	
		$this->_redirect('manager/group-user');	
	}
	
   public function statusAction()
   {
	   $db = Zend_Registry::get('connectDb');
	   $arrParam=$this->_arrParam;
	   if($this->_arrParam['type'] == 'multi')
	     {
			 if(count($arrParam['cid'])>0)
			 {
					$ids = implode(',', $arrParam['cid']);
					$status = ($arrParam['s'] == 0 )? 1:0;  
					$where = 'id IN (' . $ids . ')'; 
				    $db->update('group',array('published'=>$status),$where);
			  }
		 }
		else 
		     {
				$status = ($arrParam['s'] == 0 )? 1:0;            
				$where ="id=$arrParam[id]";  
				$db->update('group',array('published'=>$status),$where);			
			  }
		 $this->_redirect($this->_mainAction);
		 $this->_helper->viewRenderer->setNoRender();
	  }
}