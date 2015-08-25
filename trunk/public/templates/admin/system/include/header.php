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
                    <span class="version">Welcome:<?php 
                      $ns = new Zend_Session_Namespace('login');    
                         echo $ns->user;     
                                          
                    ?></span>
                    <span class="title" style="padding-left:20px">System Administration</span>
                </div>
            </div>
        </div>
        <div id="header-box">
            <div id="module-status">
                <span class="preview">
                    <a target="_blank" href="<?php echo JURI; ?>">Preview</a>
                </span>
                
                <span class="logout">
                    <a href="<?php echo $this->baseUrl(); ?>/manager/exit">Logout</a>
                </span>
            </div>
            <div id="module-menu">

                <!-- BEGIN: Menu -->
                <ul class="menuTiny" id="menuTiny">
                    <li><a href="#" class="menuTinyLink">Site</a>
                        <ul> 
                            <li><a href="<?php echo JURI; ?>/manager/index/controlpanel/">Control Panel</a></li>
                            <li><a href="<?php echo $this->baseUrl(); ?>/manager/exit">LogOut</a></li>

                        </ul>
                    </li>
                   
                    
                    <li><a href="#" class="menuTinyLink">Content Managert</a>
                        <ul>
                            <li><a href="<?php echo JURI_BACK; ?>section">Section Manager</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>category">Category Manager</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>news">Article Manager </a></li>
                        </ul>
                    </li>
                   
                   <li><a href="#" class="menuTinyLink">Product Manager</a>
                        <ul>
                            <li><a href="<?php echo JURI_BACK; ?>section-product">Section Product</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>category-product">Category Product</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>details-product">Details Product</a></li>
                        </ul>
                    </li>
                    
                     <li><a href="#" class="menuTinyLink">Commnets Manager</a>
                        <ul>
                            <li><a href="<?php echo JURI_BACK; ?>comments">Coments</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>slide">SlideShow</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>partners">Events</a></li>
                           
                        </ul>
                    </li>
                    
                     
                     <li><a href="#" class="menuTinyLink">Recruitment Manager</a>
                        <ul>
                            <li><a href="<?php echo JURI_BACK; ?>recruitment">Section Recruitment </a></li>
                            <li><a href="<?php echo JURI_BACK; ?>details">Details Recruitment</a></li>
                        </ul>
                    </li>
                   
                     
                     <li><a href="#" class="menuTinyLink">Multimedia Manager</a>
                        <ul>
                            <li><a href="<?php echo JURI_BACK; ?>menu">Menus Manager</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>user">User Manager</a></li>
                            <li><a href="<?php echo JURI_BACK; ?>config/add">Global Configuration</a></li>
                        </ul>
                    </li>
                    
                    
                    
                </ul>

                <script type="text/javascript">
                    var menu=new menu.dd("menu");
                    menu.init("menuTiny","menuTinyHover");
                </script><!-- END: Menu -->				




            </div>
            <div class="clr"></div>
        </div>
       