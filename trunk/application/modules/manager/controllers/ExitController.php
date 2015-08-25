<?php
class Manager_ExitController extends Zendvn_Controller_Action{
	
	public function indexAction()
	{
	  $ns = new Zend_Session_Namespace('login');         
      $ns->unsetAll();
	  $this->_redirect('manager');
	  $this->_helper->viewRenderer->setNoRender();
	}
}