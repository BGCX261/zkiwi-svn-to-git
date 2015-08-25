<?php 
class Model_Helper extends Zend_Db_Table{
	
	public function status($arrParam = null, $options = null,$table)
	{
		$db = Zend_Registry::get('connectDb');
		if($options == null){
			$status = ($arrParam['s'] == 0 )? 1:0;            
			$where ="id=$arrParam[id]";  
			$db->update($table,array('published'=>$status),$where);			
		   }
		
		if($options == 'multi'){
			if(count($arrParam['cid'])>0){
				$ids = implode(',', $arrParam['cid']);
				$status = ($arrParam['s'] == 0 )? 1:0;  
				$where = 'id IN (' . $ids . ')'; 
			    $db->update($table,array('published'=>$status),$where);
			 
			 }
	        }
	 }
	 
   public function sortItem($arrParam = null,$options = null,$table)
   {
	   $db = Zend_Registry::get('connectDb');
   	   if($options == null){
			foreach ($arrParam['cid'] as $val){				
				 $where = 'id = ' . $val;
				$db->update($table,array('order'=>$arrParam['order'][$val]),$where);
			}
		}
   }

   public function search($field,$join,$where)
   {
   	   $db = Zend_Registry::get('connectDb');
   	   $sql='SELECT '.$field.' FROM '.$join.' WHERE '.$where;
   	  
       $result = $db->fetchAll($sql);         
       return $result;    
    
   }
   
 public function get_rate($key='en_US')
   {
   	   $db = Zend_Registry::get('connectDb');
   	   $sql='SELECT value FROM rate WHERE code="'.$key.'"';   	  
       $result = $db->fetchAll($sql);         
       return $result;    
    
   }
	
}




?>