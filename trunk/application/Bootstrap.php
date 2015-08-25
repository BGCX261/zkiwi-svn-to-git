<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{



   protected function _initSession(){
        ob_start();
		Zend_Session::start();
        $ns = new Zend_Session_Namespace('lang');
       
        if(isset($ns->lang)==false)
        {
            $ns->lang=1;
        }
    }

	

	protected function _initDb(){
		

		$optionResources = $this->getOption('resources');

		$dbOption = $optionResources['db'];

		$dbOption['params']['username'] = 'root';

		$dbOption['params']['password'] = '';

		$dbOption['params']['dbname'] = 'zkiwi';

		

		$adapter = $dbOption['adapter'];

		$config = $dbOption['params'];

		

		$db = Zend_Db::factory($adapter,$config);

		$db->setFetchMode(Zend_Db::FETCH_ASSOC);

		$db->query("SET NAMES 'utf8'");

		$db->query("SET CHARACTER SET 'utf8'");

		

		Zend_Registry::set('connectDb',$db);

		

		Zend_Db_Table::setDefaultAdapter($db);

		

		return $db;

		

	}

}