<?php
Class Manager_Model_tags extends Zend_Db_Table
{	
	protected $_name ="tags";
	protected $_primary ="id";
	
	public function searchkq($keyword,$status=-1,$secnews=-1)
	{
		$db              = Zend_Registry::get('connectDb');
		$select          = $db->select()
		                       ->from(array('tg'=>'tags'))
		                       ->where("tg.published=$status or $status=-1")
		                       ->where("tg.title like '%$keyword%'")
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
		  	$tbl_tags = new Manager_Model_tags();
			$where = "id =$id";
		    $tbl_tags->delete($where);  	
	}
	
	public function getrow($id)
	{
		$db = Zend_Registry::get('connectDb');
		$select= $db->select()
		            ->from(array('tags'))
		            ->where("id=$id");
		$result = $db->fetchAll($select);
		return $result;
	}
	
	public  function listItemabout($status)
	{
		 $db              = Zend_Registry::get('connectDb');
		 $select          = $db->select()
		                       ->from(array('tg'=>'tags'),array('id','title'))
		                       ->where("tg.published=$status or $status=-1")
		                       ->order('id DESC');
	     $result          = $db->fetchAll($select);
	     return $result;	
	}
	
	public  function list_tags($status)
	{
		 $db              = Zend_Registry::get('connectDb');
		 $select          = $db->select()
		                       ->from(array('tg'=>'tags'),array('id','title'))
		                       ->where("tg.published=$status or $status=-1")
		                       ->order('id DESC');
	     $result          = $db->fetchPairs($select);
	     return $result;	
	}
	
	
   public function save($data)
	{	
      $introtext = stripslashes($data['introtext']);
	  
	  if ($data['key']=='add')
		  {	
			$db = Zend_Registry::get('connectDb');
		  	$data1 = array(
			              	'title'         	=> $data['title'],
		  	                'introtext'	        => $introtext,
		                    'published'			=> $data['published'],
		  	                'order'	            => $data['order'],
		  			 );
	        $db->insert('tags', $data1);
		  }
	else 
		  {
		  $tbl_tags    = new Manager_Model_tags();
		  $where       ='id ='.$data['id'];
    	  $data1       = array(
			              	'title'         	=> $data['title'],
		  	                'introtext'	        => $introtext,
		                    'published'			=> $data['published'],
		  	                'order'	            => $data['order'],
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
	
}