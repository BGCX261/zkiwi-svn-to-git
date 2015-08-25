<?php
Class Manager_Model_question extends Zend_Db_Table
{	
	protected $_name ="question";
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
	$tbl_tags      = new Manager_Model_tags();
		if(count($arrParam['cid'])>0)
	 	{
			$ids = implode(',', $arrParam['cid']);
			$where = 'id IN (' . $ids . ')'; 
			$tbl_tags->delete($where); 
		}
	 	
	 	
	}
	
	public function delete_data($id)
	{
		  	$tbl_tags = new Manager_Model_question();
			$where = "id =$id";
		    $tbl_tags->delete($where);  	
	}
	
	public function getrow($id)
	{
		$db = Zend_Registry::get('connectDb');
		$select= $db->select()
		            ->from(array('question'))
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
		                       ->from(array('q'=>'question'))
		                       ->where("q.published=$status or $status=-1")
		                       ->order('id DESC');
	     $result          = $db->fetchAll($select);
	     return $result;	
	}
	
   public function save($data)
	{	
      $introtext = stripslashes($data['content']);
	  $ns = new Zend_Session_Namespace('login');        
			       
	  if ($data['key']=='add')
		  {	
			$db = Zend_Registry::get('connectDb');
		  	$data1 = array(
			              	'title'         	=> $data['title'],
		  	                'content'	        => $introtext,
		                    'images'			=> $data['images'],
		  	                'published'	        => $data['published'],
		  	                'order'         	=> $data['order'],
		  	                'created'	        => date('Y-m-d h-i-s'),
		                    'user_id'			=> $ns->id,
		  	                'mod'	            => '0',
		  	                'flag'	            => '0',
		  	                'score'         	=> $data['score'],
		  	                'type'		        => '0',
		  			 );
	        $db->insert('question', $data1);
		  }
	else 
		  {
		  $tbl_tags    = new Manager_Model_question();
		  $where       ='id ='.$data['id'];
    	  $data1 = array(
			              	'title'         	=> $data['title'],
		  	                'content'	        => $introtext,
		                    'images'			=> $data['images'],
		  	                'published'	        => $data['published'],
		  	                'order'         	=> $data['order'],
		  	                'created'	        => date('Y-m-d h-i-s'),
		                    'user_id'			=> $ns->id,
		  	                'mod'	            => '0',
		  	                'flag'	            => '0',
		  	                'score'         	=> $data['score'],
		  	                'type'		        => '0',
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
	
   public function get_question()
	{
		$db = Zend_Registry::get('connectDb');
		$select= $db->select()
		            ->from(array('question'))
		            ->order('id DESC');
		$result = $db->fetchPairs($select);
		return $result;
	}
}