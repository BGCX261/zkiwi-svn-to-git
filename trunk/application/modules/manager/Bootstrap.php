<?php
class Manager_Bootstrap extends Zend_Application_Module_Bootstrap{
   
	protected function _initSession(){
		Zend_Session::start();
		$lg = new Zend_Session_Namespace('login');
	}
	
	
}