<?php
class Zendvn_Controller_Action extends Zend_Controller_Action{
	
	public function loadTemplate($template_path = null, $fileConfig = 'template.ini', $sectionConfig = 'default'){		
		
	
		$this->view->headScript()->getContainer()->exchangeArray(array());
		$this->view->headMeta()->getContainer()->exchangeArray(array());
		$this->view->headLink()->getContainer()->exchangeArray(array());
		
		$filename = $template_path . '/' . $fileConfig;
		$config  = new Zend_Config_Ini($filename,$sectionConfig);
		$arrConfig = $config->toArray();
		
		$this->view->headTitle($arrConfig['title'],true);
		
		$metaHttp = $arrConfig['metaHttp'];
		if(count($metaHttp)>0){
			foreach ($metaHttp as $val){
				$tmp = explode('||', $val);
				$this->view->headMeta()->appendHttpEquiv($tmp[0],$tmp[1]);
			}
		}
		
		$metaName = $arrConfig['metaName'];
		if(count($metaName)>0){
			foreach ($metaName as $val){
				$tmp = explode('||', $val);
				$this->view->headMeta()->appendName($tmp[0],$tmp[1]);
			}
		}
		
		$cssUrl = $arrConfig['url'] . $arrConfig['dirCss'];
		$fileCss = $arrConfig['fileCss'];
		if(count($fileCss)>0){
			foreach ($fileCss as $val){				
				$this->view->headLink()->appendStylesheet($cssUrl . $val,'screen' );
			}
		}
		
		$jsUrl = $arrConfig['url'] . $arrConfig['dirJs'];
		$fileJs = $arrConfig['fileJs'];
		if(count($fileJs)>0){
			foreach ($fileJs as $val){				
				$this->view->headScript()->appendFile($jsUrl . $val);
			}
		}
		
		if(count($arrConfig['dirs'])>0){
			foreach ($arrConfig['dirs'] as $val){
				$arrDir[$val] = $arrConfig['url']  . '/' . $val;
			}
		}
		
		$options = array(
						'layout'=>$arrConfig['layout'],
						'layoutPath'=>$template_path,						
						'viewSuffix'=>'phtml',						
						);
		Zend_Layout::startMvc($options);
		$this->view->arrDir = $arrDir;
	}
	

}