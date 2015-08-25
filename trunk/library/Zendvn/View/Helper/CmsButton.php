<?php
class Zendvn_View_Helper_CmsButton extends Zend_View_Helper_Abstract{
	
	//$this->formRadio($name,$value,$attribs,$options, $listep);
	/*$attribs = array(
					'icon'=>'icon-32-delete.png',
					'iconDir'=>'images/toolbar/',
				)*/
	//$options = array('type'=>'submit','name'=>'appForm');
	public function cmsButton($name,$value = '#',$attribs = null,$options = null ){
		
		$iconDir = $attribs['iconDir'];
		if(empty($iconDir))$iconDir = "images/toolbar/";
	
		$icon = $attribs['icon'];
		if(empty($icon)) $icon = 'icon-32-default.png';
		
		$src = $iconDir . $icon;
		
		$link = $value;
		if($options['type'] == 'submit'){
			$link = "javascript:onSubmitForm('" . $options['name'] . "','" .  $value . "')";
		}
				
		$xhtml = '<div class="toolbar-button" >
                   <a href="' .  $link . '">
        			<img src="' . $src . '">  
                    <br>' . $name . '
                   </a>
                 </div>';
		return $xhtml;
	}
}