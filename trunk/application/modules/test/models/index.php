<?php
class Test_Model_index extends Zend_Db_Table{

	public function get_cat()
	{
		$db = Zend_Registry::get('connectDb');
		$select = $db->select()
		          ->from('check', array('id','title','parents')) 
		          ->where('published = ?', '1');
		$result = $db->fetchAll($select);
	    return $result;          
		
	}	
	
	public function get_content($menu,$parents = 0,$level = 1,&$newMenu)
	{
		foreach ($menu as $key => $val){
			if($val['parents'] == $parents){
				$val['level'] = $level;
				$newMenu[] = $val;
				unset($menu[$key]);
				$this->get_content($menu,$val['id'],$val['level'] + 1,$newMenu);
			}
		}
		
		return $newMenu;
	}
	
   
	
}