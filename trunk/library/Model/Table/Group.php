<?php
class Model_Table_Group extends Zend_Db_Table{
	protected $_name = "user_group";
	protected $_primary = "id"; 
	
	public function statusItem($arrParam = null,$options = null){
		if($options == null){
			
			$status = ($arrParam['s'] == 0 )? 1:0;
									
			$data = array('status'=>$status);
			$where = 'id = ' . (int)$arrParam['id'];
			$this->update($data, $where);
		}
		
		if($options['task'] == 'multi'){
			if(count($arrParam['cid'])>0){
				$ids = implode(',', $arrParam['cid']);
				$where = 'id IN (' . $ids . ')';
				$data = array('status'=>$arrParam['s']);
				$this->update($data, $where);
			}
		}
	}
	
	public function deleteItem($arrParam = null,$options = null){
		if($options == null){
			if((int)$arrParam['id']>0){
				$where = 'id = ' . (int)$arrParam['id'];
				$this->delete($where);
			}
		}
	}
	
	public function getItem($arrParam = null,$options = null){
		
		if($options == null){
			$where = 'id = ' . (int)$arrParam['id'];
			$result = $this->fetchRow($where)->toArray();
		}
		return $result;
	}
	
	public function listItem($arrParam = null,$options = null){
		$result = $this->fetchAll(null,'id DESC')->toArray();
		
		return $result;
	}
	
	public function saveItem($arrParam = null,$options = null){
		
		if($options['task'] == 'admin-edit'){
			
			$where = 'id = ' . (int)$arrParam['id'];
			$row = $this->fetchRow($where);
			$row->name			= $arrParam['name'];
			$row->avatar 		= $arrParam['avatar'];
			$row->ranking		= $arrParam['ranking'];
			$row->group_acp		= $arrParam['group_acp'];
			$row->group_default	= $arrParam['group_default'];
			$row->modified		= date('Y-m-d H:i:s');
			$row->modified_by	= 1;
			$row->permission	= $arrParam['permission'];
			$row->status		= $arrParam['status'];
			$row->order			= $arrParam['order'];			
		
			$row->save();
		}
		
	if($options['task'] == 'admin-add'){
			$row = $this->fetchNew();
			$row->name			= $arrParam['name'];
			$row->avatar 		= $arrParam['avatar'];
			$row->ranking		= $arrParam['ranking'];
			$row->group_acp		= $arrParam['group_acp'];
			$row->group_default	= $arrParam['group_default'];
			$row->created		= date('Y-m-d H:i:s');
			$row->created_by	= 1;
			$row->permission	= $arrParam['permission'];
			$row->status		= $arrParam['status'];
			$row->order			= $arrParam['order'];
			$row->save();
		}
	}
}