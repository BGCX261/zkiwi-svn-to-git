<?php echo $this->docType();?>
    <head>
       
<?php echo $this->headTitle();?>
<?php echo $this->headLink();?>
<?php echo $this->headMeta();?>
<?php echo $this->headScript();?>

    </head>
    <body id="minwidth-body">
        <div id="border-top" class="h_green">
            <div>
                <div>
                   <span class="version v1">
                        <a href="<?php echo JURI_BACK.'exit' ?>">Log out</a>
                     </span>
                   <span class="version">Welcome:<?php 
                      $ns = new Zend_Session_Namespace('login');    
                         echo $ns->user.' | ';     
                                          
                    ?>
                    
                    </span>
                    
                    <span class="title" style="padding-left:20px">Administration - Welcome Zkiwi CMS System</span>
                </div>
            </div>
        </div>
        <div id="header-box">
            
           
            <div class="clr"></div>
        </div>
        
        
        
        