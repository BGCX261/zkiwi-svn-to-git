<?php
Class Manager_Model_group extends Zend_Db_Table
{
	protected $_name ="group";
	protected $_primary ="id";
		
	public function get_info()
	{
	  $db = Zend_Registry::get('connectDb');
			$select= $db->select()
						->from(array('up'=>'group'))
					    ->order('up.id desc');			
		$result = $db->fetchAll($select);
		return $result;	
	
	}
	
    public function searchkq($keyword)
	{
		$db            = Zend_Registry::get('connectDb');
		$select        = $db->select()
		                    ->from(array('up'=>'group'))
		                    ->where("up.title like '%$keyword%'") 
		                    ->order('up.id desc');	
		$result = $db->fetchAll($select);
		return $result;	
	}
	
    public function save($data)
	{	
	   $ns        = new Zend_Session_Namespace('login');        
	   $user_id   =$ns->id;
	   $introtext = stripslashes($data['description']);
	   if ($data['key']=='add')
		  {	
			$db        = Zend_Registry::get('connectDb');
			$data1 = array(
		  	              	'title'         	=> $data['title'],
		                	'introtext'         => $introtext,
	                        'published'         => $data['published'],
		  			       );
	              $db->insert('group', $data1);
		     }
	    else 
		  {
		  $tbl_section   = new Manager_Model_group();
		  $where         = 'id ='.$data['id'];
    	  $data1 = array(
		  	                'title'         	=> $data['title'],
		                	'introtext'         => $introtext,
	                        'published'         => $data['published'],
		  			     );
    	  $tbl_section->update($data1,$where);
		  
		  }  
     }
     
    public function getrow($id)
	{
				$db          = Zend_Registry::get('connectDb');
				$select      = $db->select()
				                  ->from(array('g'=>'group'))
				                  ->where("id=$id");
				$result = $db->fetchAll($select);
				return $result;
	}

    public function delete_data($id)
	{
		  	$tblGroup = new Manager_Model_group();
			$where = "id =$id";
		    $tblGroup->delete($where);  	
	}
	
    public function privileges_group_data($id)
	{
		  	$db    = Zend_Registry::get('connectDb');
			$where = "user_group_id =$id";
		    $db->delete('user_privileges', $where); 	
	}
	
    public function delete_muti($arrParam = null)
	{
	$tblGroup = new Manager_Model_group();
		if(count($arrParam['cid'])>0)
	 	{
			$ids = implode(',', $arrParam['cid']);
			$where = 'id IN (' . $ids . ')'; 
			$tblGroup->delete($where); 
			 
	 	}
	}
}