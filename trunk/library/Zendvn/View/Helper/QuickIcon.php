<?php
class Zendvn_View_Helper_QuickIcon extends Zend_View_Helper_Abstract{

	public function QuickIcon($name,$value,$attribs=NULL)
	{
	   $iconDir = $attribs['iconDir'];
		if(empty($iconDir))$iconDir = "images/icon/";
	
		$icon = $attribs['icon'];
		if(empty($icon)) $icon = 'icon-32-default.png';
		
		$src = $iconDir . $icon;
		
		$xhtml = '<div class="icon-button" >
                   <a href="' .  $value . '">
        			<img src="' . $src . ' ">  
                    <br>' . $name . '
                   </a>
                 </div>';
		return $xhtml;
	
	
	}

}