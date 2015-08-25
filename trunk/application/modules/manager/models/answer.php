<?php
Class Manager_Model_answer extends Zend_Db_Table
{	
	protected $_name ="answer";
	protected $_primary ="id";
	
	public function searchkq($keyword,$status=-1,$secnews=-1)
	{
		$db              = Zend_Registry::get('connectDb');
		$select          = $db->select()
		                       ->from(array('q'=>'question'))
		                       ->where("q.published=$status or $status=-1")
		                       ->where("q.title like '%$keyword%'")
		                       ->order('id DESC');
	     $result          = $db->fetchAll($select);
	     return $result;	
	}
	
   public function delete_muti($arrParam = null)
	{
    $db            = Zend_Registry::get('connectDb');
	$tbl_tags      = new Manager_Model_answer();
		if(count($arrParam['cid'])>0)
	 	{
			$ids = implode(',', $arrParam['cid']);
			$where = 'id IN (' . $ids . ')'; 
			$tbl_tags->delete($where); 
		}
	 	
	 	
	}
	
	public function delete_data($id)
	{
		  	$tbl_tags = new Manager_Model_answer();
			$where = "id =$id";
		    $tbl_tags->delete($where);  	
	}
	
	public function getrow($id)
	{
		$db = Zend_Registry::get('connectDb');
		$select= $db->select()
		            ->from(array('answer'))
		            ->where("id=$id");
		$result = $db->fetchAll($select);
		return $result;
	}
	
    public function get_id()
	{
		$db = Zend_Registry::get('connectDb');
		$select= $db->select()
		            ->from(array('question'))
		            ->order('id DESC')
		            ->limit(1,0);
		$result = $db->fetchAll($select);
		return $result;
	}
	
	public  function listItemabout($status)
	{
		 $db              = Zend_Registry::get('connectDb');
		 $select          = $db->select()
		                       ->from(array('a'=>'answer'))
		                       ->join(array('q'=>'question'),'a.question_id=q.id',array('q.title as question'))
		                       ->where("a.published=$status or $status=-1")
		                       ->order('a.id DESC');
	     $result          = $db->fetchAll($select);
	     return $result;	
	}

   public function save($data)
	{	
      $fulltext = stripslashes($data['fulltext']);
	  $ns = new Zend_Session_Namespace('login');        
			       
	  if ($data['key']=='add')
		  {	
			$db = Zend_Registry::get('connectDb');
		  	$data1 = array(
			              	'title'         	=> $data['title'],
		  	                'images'	        => $data['images'],
		                    'content'			=> $fulltext,
		  	                'published'	        => $data['published'],
		  	                'order'         	=> $data['order'],
		  	                'created'	        => date('Y-m-d h-i-s'),
		                    'question_id'		=> $data['question'],
		  	                'score'	            => $data['score'],
		  	                'user_id'	        => $ns->id,
		  	              );
	        $db->insert('answer', $data1);
		  }
	else 
		  {
		  $tbl_tags    = new Manager_Model_answer();
		  $where       ='id ='.$data['id'];
    	  $data1 = array(
			              	'title'         	=> $data['title'],
		  	                'images'	        => $data['images'],
		                    'content'			=> $fulltext,
		  	                'published'	        => $data['published'],
		  	                'order'         	=> $data['order'],
		  	                'created'	        => date('Y-m-d h-i-s'),
		                    'question_id'		=> $data['question'],
		  	                'score'	            => $data['score'],
		  	                'user_id'	        => $ns->id,
		  			 );
	       $tbl_tags->update($data1,$where);
		  
		  }  
     }
     
	 public function delete_data_group($id)
	{
		  	$db = Zend_Registry::get('connectDb');
			$where = "categorys_id =$id";
		    $db->delete('user_privileges',$where);  	
	}
	
    public function delete_data_content($id)
	{
		  	$db = Zend_Registry::get('connectDb');
			$where = "cat_id =$id";
		    $db->delete('article',$where);  	
	}
	
	public function save_join($id,$cid)
	{
	  $tbl_questoin = new Manager_Model_question();
	  $tbl_questoin->delete_join($id);
		
	  $db = Zend_Registry::get('connectDb');
	  if (count($cid)>0)
	  {
	    for ($i = 0; $i < count($cid); $i++) {
	    	$data1 = array(
			                'question_id'	    => $id,
		                    'tags_id'			=> $cid[$i],
		  	              );
	        $db->insert('joiner', $data1);
	    }
	  }
	}
	
    public function delete_join($id)
	{
		  	 $db = Zend_Registry::get('connectDb');
			 $where = "question_id =$id";
		     $db->delete('joiner',$where);  	
	}
	
	public function list1($id) {
		$db       = Zend_Registry::get('connectDb');
	    $query    = "SELECT id,title FROM tags
				     WHERE id NOT IN (select tags_id from joiner where question_id=$id)
				     ORDER BY title asc";
		$result = $db->fetchAll($query)	;
		return $result;	
	}
	
    public function list2($id) {
		$db       = Zend_Registry::get('connectDb');
	    $query    = "SELECT id,title FROM tags
				     WHERE id  IN (select tags_id from joiner where question_id=$id)
				     ORDER BY title asc";
		$result = $db->fetchAll($query)	;
		return $result;	
	}
}