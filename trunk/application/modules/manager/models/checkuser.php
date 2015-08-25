<?php class Manager_Model_checkuser extends Zend_Db_Table{
     
	 
	function check($user,$passwd)
	 {
	 	
	 	$db = Zend_Registry::get('connectDb');
	 	$select = $db->select()
		          ->from(array('ue' => 'user'),  array('id','user_name')) 
		          ->where('ue.user_name = ?',$user)
		          ->where('ue.password  = ?',$passwd)
		          ->where('ue.activi = ?',1);
       
	     $result = $db->fetchAll($select);
		 return $result;          
	 }



}
?>
