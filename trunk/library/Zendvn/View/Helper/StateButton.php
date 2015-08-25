<?php
class Zendvn_View_Helper_StateButton extends Zend_View_Helper_Abstract{

	public function stateButton($name,$default='Choose item',$array)
	{
	   	$option='<option value=-1>'.$default.'</option>';
		foreach ($array as $key=>$value)
		{
		
		 $option.='<option value='.$key.'>'.$value.'</option>';
		
		}
		$xhtml='<select name='.$name.' id='.$name.'>'.$option.'</select>';
		return $xhtml;
	}

}