<?php
class Zendvn_Validate_check extends Zend_Validate_Abstract{

	const PHONE_INVALID  = 'phoneInvalid';
    
    protected $_messageTemplates = array(
        self::PHONE_INVALID   => "'%value%' khong phai la so phone",        
    );
    
	private $_pattern = '^[0-9]{3}-[0-9]{2}-[0-9]{2}\.[0-9]{6}$';
	
	public function isValid($value){
		//$phone = '084-08-38.223344'
		
		if(!ereg($this->_pattern,$value)){
			$this->_error(self::PHONE_INVALID,$value);
			return false;
		}
		return true;
	}
	
	public function check_empty($value)
	{
     	$validator = new Zend_Validate_NotEmpty();
        if (!$validator->isValid ($value)==true) 
        {
	       $error="Enter you data";
	       return $error; 
        }
	}
}