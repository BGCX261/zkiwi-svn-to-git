<?php
Class Manager_Model_user extends Zend_Db_Table
{
	protected $_name ="users";
	protected $_primary ="id";
	
	public  function save($data)
	{
	  $ns        = new Zend_Session_Namespace('login');        
	  $user_id   =$ns->id;
	  
	  $birthday=$data['popup_container'];
	  $Ngay_arr = explode("/",$birthday); // array( 2012-02-24)
	  if (count($Ngay_arr)>1)
	  {
	     $m        = $Ngay_arr[0];  
	     $d       = $Ngay_arr[1]; 
	     $y        = $Ngay_arr[2]; 
	     $ngay     = $y.'-'.$m.'-'.$d;
	  }
	 else 
	      $ngay=$birthday;
	  
	  $tbl_user=new Manager_Model_user();
	  
	  if ($data['key']=='add')
		  {	
			$db = Zend_Registry::get('connectDb');
			$pass=md5($data['password']);
		  	$data1 = array(
			              	'user_name'         	=> $data['user_name'],
		  	                'password'            	=> $pass,
		  	                'email'	                => $data['email'],
							'first_name'			=> $data['first_name'],
							'last_name'	            => $data['last_name'],
						  	'birthday'	            => $ngay,
						   	'published'	            => $data['published'],
	                     
		  	                
		  			 );
	        $db->insert('users', $data1);
	        
		  }
	    else 
		  {
		  $tblGroup = new Manager_Model_user();
		  $where ='id ='.$data['id'];
		  $pass=md5($data['password']);

           if ($data['password']=='')
		      $pass = $data['pass'];
		  else 
		      $pass = md5($data['password']);

    	  $data1 = array(
			              	'user_name'         	=> $data['user_name'],
		  	                'password'            	=> $pass,
		  	                'email'	                => $data['email'],
							'first_name'			=> $data['first_name'],
							'last_name'	            => $data['last_name'],
						  	'birthday'	            => $ngay,
						   	'published'	            => $data['published'],
	                       
		  			 );
    	  $tblGroup->update($data1,$where);
		 	
		  }  
	
	}
	
	public function get_info($status=-1)
	{
	  $db = Zend_Registry::get('connectDb');
			$select= $db->select()
						->from(array('u'=>'users'))
						->where("u.published=$status or $status=-1") 
						->order('u.id desc');			
		$result = $db->fetchAll($select);
		return $result;	
	
	}
	
    public function get_data($id)
	{
	  $db = Zend_Registry::get('connectDb');
			$select= $db->select()
						->from(array('u'=>'users'))
						->where("u.id=$id");			
		$result = $db->fetchAll($select);
		return $result;	
	
	}
	
    public function searchkq($keyword,$status=-1)
	   {
		$db = Zend_Registry::get('connectDb');
			$select = $db->select()
		          ->from(array('ue' => 'users'))
		          ->where("ue.published=$status or $status=-1 AND ue.user_name like '%$keyword%'")
		          ->order('ue.id desc');
		$result = $db->fetchAll($select);
		return $result;	
	   }
	
    public function group() {
		$db = Zend_Registry::get('connectDb');
			$query="SELECT id,title FROM user_group 
				Order By title asc";
			$result = $db->fetchAll($query)	;
			return $result;	
	}
	
    public function save_group($data,$id)
	  {
	
	     $item=$data['toBox'];
	     $db = Zend_Registry::get('connectDb');

	     for($i=0;$i<count($item);$i++)
	       {
				       $data1  = array(
				                       'user'       => $id,
				                       'groups'     => $item[$i],
				  	                   );
	                   $db->insert('group_user_privileges', $data1);
	       }   
  	}

    public function layid()
	{
		 		$db = Zend_Registry::get('connectDb');	
				$query="Select * from user order by id DESC LIMIT 0,1";
		  		$result = $db->fetchRow($query);
		   		$id=$result[id]; 
		   		return $id;
	}

    public function edit_desl($id) {
		$db     = Zend_Registry::get('connectDb');
	    $query  = "SELECT t.id,t.title FROM user_group as t
                   WHERE t.id NOT IN (select gs.groups  
                   FROM group_user_privileges as gs where user=$id)";
		$result = $db->fetchAll($query);
		return $result;	
	}
	
	public function edit_desr($id) {
		$db    = Zend_Registry::get('connectDb');
		$query = "SELECT up.id,up.title 
                  FROM user_group  as up INNER JOIN group_user_privileges as gs ON up.id=gs.groups
                  WHERE user=$id";
		$result = $db->fetchAll($query);
		return $result;	
	}
	
   public function delete_data($id)
	{
		  	$tblGroup = new Manager_Model_user();
			$where = "id =$id";
		    $tblGroup->delete($where);  	
	}
	
   public function delete_muti($arrParam = null)
	{
	$tblGroup = new Manager_Model_user();
		if(count($arrParam['cid'])>0)
	 	{
			$ids = implode(',', $arrParam['cid']);
			$where = 'id IN (' . $ids . ')'; 
			$tblGroup->delete($where); 
			 
	 	}
	}

    public function xoa($id){
		  	$db = Zend_Registry::get('connectDb');
			$where = "user= $id";
		    $db->delete('group_user_privileges',$where);  
	}
	
}