<?php
class Zendvn_View_Helper_SearchButton extends Zend_View_Helper_Abstract{

	public function searchButton($key)
	{
	  
	 $xhtml='<table><tr><td>Filter</td><td><input type="text" id="keyword" name="keyword" value="'.$key.'"/></td>
		<td><input type="submit" id="go" name="go" value="go"/></td>
	   <td><input type="reset" id="reset" name="reset" value="Reset" /></td></tr></table>';
		
		return $xhtml;
	
	}

}