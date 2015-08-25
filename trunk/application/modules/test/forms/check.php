<?php
class Form_Valid_InsertUser extends Zend_Form
{
	public $messages;
	public function __construct($data)
	{
		$val = new Zend_Validate_NotEmpty();
		$vl = new Admin_Model_User;
		if($val->isValid($data['username'])==false)
			$this->messages[] = "Username KO Null";
	}
	public function valid()
	{
		if($this->messages!="")
			return FALSE;
		else return TRUE;
	}
}