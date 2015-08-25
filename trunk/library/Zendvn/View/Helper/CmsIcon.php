<?php
class Zendvn_View_Helper_CmsIcon extends Zend_View_Helper_Abstract{
	
	//$this->formRadio($name,$value,$attribs,$options, $listep);
	/*$attribs = array(
					'icon'=>'icon-32-delete.png',
					'iconDir'=>'images/toolbar/',
				)*/
	//$options = array('type'=>'submit','name'=>'appForm');
	
	/* <a href="#">
        <img src="images/icon_info.png" title="abc"> 
     </a>*/
	public function cmsIcon($name,$value = '#',$attribs = null,$options = null ){
		
		$iconDir = $attribs['iconDir'];
		if(empty($iconDir))$iconDir = "images/";
	
		$icon = $attribs['icon'];
		if(empty($icon)) $icon = 'icon_info.png';
		
		$src = $iconDir . $icon;
		
		$link = $value;
	
		$xhtml = '<a href="' . $link . '">
        			<img src="' . $src .'" title="' . $name . '"> 
     				</a>';
		return $xhtml;
	}
}



