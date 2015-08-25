<?php
class Ask_Model_ask extends Zend_Db_Table{
	
	public function get_tags()
	{
		$db         = Zend_Registry::get('connectDb');
		$select     = $db->select()
		                 ->from(array('tags'),array('id','title'))
		                 ->where('published=1');
	    $result = $db->fetchAll($select);
	    return $result;
		
	}
	
	public function save($data)
	{
		$db         = Zend_Registry::get('connectDb');
		$data1      = array(
			              	'title'         	=> $data['title'],
	                        'content'	        => $content,
	                        'published'	        => $data['published'],
							'order'	            => $data['order'],
	                        'created'           => $data['section_product_id'],
	                        'user_id'           => $data['language_id'],
		  				   );
	     $db->insert('question', $data1);     
		
		
	}
	
	public function save_user($data)
	{
		$db         = Zend_Registry::get('connectDb');
		$data1      = array(
			              	'user_name'        	=> $data['namelogin'],
	                        'password'	        => md5($data['cfpassw']),
	                        'email'	            => $data['cfemailAuthor'],
							'full_name'	        => $data['nameAuthor'],
	                        'activi'            => 1,
	                        'created'           => date('Y-m-d h-i-s'),
		                    'ip'                =>$_SERVER['REMOTE_ADDR'],
		                    'group_id'          => 2,
		  				   );
	     $db->insert('user', $data1);     
	}


}
?>