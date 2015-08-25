<?php
class Manager_AnswerController extends Zendvn_Controller_Action{
	
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
        
        $this->_mainAction    = $this->_arrParam['module'] . '/' . $this->_arrParam['controller'] . '/index';	
	    $this->view->arrParam = $this->_arrParam; 
        
	    $tbl_tags             = new Manager_Model_tags();
	    $this->view->tags     = $tbl_tags->list_tags($status=-1);
	    
	    $tbl_question         = new Manager_Model_question();
	    $this->view->question = $tbl_question->get_question();
	  
	}
	
	public function indexAction()
	{
        $this->view->Title = "Question Manager";
		$this->view->headTitle($this->view->Title,true);
		
		$tbl_answer=new Manager_Model_answer();
		if($this->_request->getCookie('status')==NULL){ $status=-1; } 
			 else { $status=$this->_request->getCookie('status');}
		
		if($this->_request->getCookie('keyword')!=Null){
			
			 $keyword=$this->_request->getCookie('keyword');
			 $this->view->keyword=$keyword;
			 
			 $listArticles = $tbl_answer->searchkq($keyword,$status);
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
     	 	$listArticles = $tbl_answer->listItemabout($status);
     	 	
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
	 $this->view->Title = "Question Manager :[Add].";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	 
	 $tbl_question=new Manager_Model_answer();
	 if($this->_request->isPost()==true)
		{	
		   $data=$this->_arrParam;
		   $tbl_question->save($data);	
		
	       $this->_redirect('manager/answer'); 
		}
	}
	
	public function editAction()
	{
	 $this->view->Title = "Question Manager ::[Edit]";
	 $this->view->headTitle($this->view->Title,true);
	 
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckeditor/ckeditor.js');
	 $this->view->headScript()->appendFile($this->view->baseUrl().'/ckfinder/ckfinder.js');
	 
	 
	 $tbl_question       = new Manager_Model_answer();
	 $id                 = $this->_request->getParam('id');
	 $data               = $tbl_question->getrow($id);
	 $this->view->result =$data;
	
	}
	
    public function statusAction(){
		
   $db = Zend_Registry::get('connectDb');
   $arrParam=$this->_arrParam;
   if($this->_arrParam['type'] == 'multi'){
		    
			if(count($arrParam['cid'])>0){
				$ids = implode(',', $arrParam['cid']);
				$status = ($arrParam['s'] == 0 )? 1:0;  
				$where = 'id IN (' . $ids . ')'; 
			    $db->update('answer',array('published'=>$status),$where);
			}
			 }
	else 
	     {
			$status = ($arrParam['s'] == 0 )? 1:0;            
			$where ="id=$arrParam[id]";  
			$db->update('answer',array('published'=>$status),$where);			
		   	 
	        }
	 $this->_redirect($this->_mainAction);
	 $this->_helper->viewRenderer->setNoRender();
	  }

    public  function deleteAction()
	{
		$res = new Manager_Model_answer();
		$id=$this->_request->getParam('id');
		$res->delete_data($id);
		$this->_redirect('manager/answer');
	}
	
    public function mutiAction()
	{
	    $tblsection=new Manager_Model_answer();
		$tblsection->delete_muti($this->_arrParam);
		$this->_redirect('manager/answer');
		$this->_helper->viewRenderer->setNoRender();
	}
	
	
}