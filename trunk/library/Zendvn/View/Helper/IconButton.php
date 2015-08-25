<?php
class Zendvn_View_Helper_IconButton extends Zend_View_Helper_Abstract{

	public function iconButton($name,$value,$attribs=NULL)
	{
	   $iconDir = $attribs['iconDir'];
		if(empty($iconDir))$iconDir = "images/icon/";
	
		$icon = $attribs['icon'];
		if(empty($icon)) $icon = 'icon-32-default.png';
		
		$src = $iconDir . $icon;
		
		$xhtml = '<div class="quick_button" >
                   <a href="' .  $value . '">
        			<img src="' . $src .'" title="' . $name .' ">  
                    
                   </a>
                 </div>';
		return $xhtml;
	
	
	}

}