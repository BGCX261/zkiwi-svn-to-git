<?php
class Zendvn_View_Helper_ParentItem extends Zend_View_Helper_Abstract{
	
	
	public function parentItem($name,$default='Choose item',$make="",$array)
	{
		
		$option='<option value=0>'.$default.'</option>';
		foreach ($array as $val)
		{
		  $str=" "; 
		       if ($val['level']>1)
                    {
	                    for ($i=0;$i<$val['level']-1;$i++){
	                        $str.=" - ";    
	                    }
	                   
	                }
                 $title=$str.$val['title'];
                 
                 if($make==$val['id']) $selected='selected="selected"';
                 else $selected="";
                 
                    
                  
		 $option.='<option '.$selected.' value='.$val['id'].'>'.$title.'</option>';
		
		}
		$xhtml='<select class="cbo_box" name='.$name.' id='.$name.'>'.$option.'</select>';
		return $xhtml;
	}
}