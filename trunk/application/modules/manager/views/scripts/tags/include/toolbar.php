<?php 
	 
    $action = $this->arrParam['action'];
          
 	$lnkNew = $this->url(array('action'=>'add'));
 	$btnNew = $this->cmsButton('New',$lnkNew);
 	
 	$lnkDelete = $this->url(array('action'=>'muti','type'=>'multi','s'=>0));
 	$btnDelete = $this->cmsButton('Delete',$lnkDelete,array('icon'=>'icon-32-delete.png')
 									,array('type'=>'submit','name'=>'appForm')
 									);
 	
 	
 	$lnkActive = $this->url(array('action'=>'status','type'=>'multi','s'=>0));
 	$btnActive = $this->cmsButton('Publish',$lnkActive,array('icon'=>'icon-32-active.png')
 									,array('type'=>'submit','name'=>'appForm')
 									);
 	
 	$lnkInactive = $this->url(array('action'=>'status','type'=>'multi','s'=>1));
 	$btnInactive = $this->cmsButton('Unpublish',$lnkInactive,array('icon'=>'icon-32-inactive.png')
 									,array('type'=>'submit','name'=>'appForm')
 									);
 									
    $lnkFutured = $this->url(array('action'=>'featured','type'=>'multi','s'=>0));
 	$btnFutured = $this->cmsButton('Hiện Home',$lnkFutured,array('icon'=>'icon-32-new.png')
 									,array('type'=>'submit','name'=>'appForm')
 									);
 	
 	$lnkInFutured = $this->url(array('action'=>'featured','type'=>'multi','s'=>1));
 	$btnInFutured = $this->cmsButton('Ẩn Home',$lnkInFutured,array('icon'=>'icon-32-default.png')
 									,array('type'=>'submit','name'=>'appForm')
 									);									
 	
 								
 	$lnkSort = $this->url(array('action'=>'sort'));
 	$btnSort = $this->cmsButton('Sort',$lnkSort,array('icon'=>'icon-32-sort.png'),
 								array('type'=>'submit','name'=>'appForm')
 								);
 	
 	$lnkSave = $this->url(array('action'=>'add'));
 	$btnSave = $this->cmsButton('Save',$lnkSave,array('icon'=>'icon-32-save.png')
 									,array('type'=>'submit','name'=>'appForm'));
 	
 	$lnkCancel = $this->url(array('action'=>'index'));
 	$btnCancel = $this->cmsButton('Cancel',$lnkCancel,array('icon'=>'icon-32-cancel.png'));
 	
 	$strButton =  $btnSort . ' ' . $btnActive . ' ' . $btnInactive . ' ' .$btnNew . ' ' . $btnDelete ;
 	
 	switch ($action){
 		case 'add': $strButton =  $btnSave . ' ' . $btnCancel;
 					break;
 		case 'edit': $strButton =  $btnSave . ' ' . $btnCancel;
 					break;
 								
 		default: $strButton =  $btnSort . ' ' . $btnActive . ' ' 
 							   . $btnInactive . ' ' .$btnNew . ' ' . $btnDelete ;
 	}
 ?>
  <div id="toolbar-box">
                            <div class="t"><div class="t"><div class="t"></div></div></div>
                            <div class="m">
                                <div id="toolbar" class="toolbar" >				
                         		<?php echo $strButton;?>
                                   
                                  <div class="clr"></div>
                                </div>
                                <div class="header icon-48-install"><?php echo $this->Title;?></div>
                                
                                <div class="clr"></div>
                            </div>
                            <div class="b"><div class="b"><div class="b"></div></div></div>
                        </div>
                        
                        <div class="clr"></div>