<?php
Class Default_Model_register extends Zend_Db_Table{
	
	protected $_name ="user";
	protected $_primary ="id";
	
    public function register_save($data)
    {
      $pass  = md5($data['cfpassw']);
      $db    = Zend_Registry::get('connectDb');
      $data1 = array(
			              	'user_name'         	=> $data['user_name'],
		  	                'password'             	=> $pass,
		  	                'email'	                => $data['emailAuthor'],
		                	'full_name'	            => $data['nameAuthor'],
		  	                'activi'			    => 0,
		  	                'created'			    => date('Y-m-d h-i-s'),
							'ip'	                => $_SERVER['REMOTE_ADDR'],
	                        'group_id'	            => 2,
		  			 );
	  $db->insert('user', $data1);
    }

}
?>