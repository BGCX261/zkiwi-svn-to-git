<?php
class Zendvn_Model_Table_Group extends Zend_Db_Table{
	protected $_name = "user_group";
	protected $_primary = "id"; 
	
	public function listItem($arrParam = null,$options = null){
		$result = $this->fetchAll()->toArray();
		
		return $result;
	}
}