<?php
class Zendvn_View_Helper_FilterButton extends Zend_View_Helper_Abstract{

	public function filterButton($name,$default='Choose item',$array)
	{
	   $option='<option value=-1>'.$default.'</option>';
		
		foreach ($array as &$value)
		{
		 	$option.='<option value='.$value['id'].'>'.$value['name'].'</option>';
		}
			$xhtml='<select name='.$name.' id='.$name.'>'.$option.'</select>';
			return $xhtml;
	
	}

}