<?php 
  Zend_Session::start();
  echo $this->docType();
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php echo $this->headTitle();?>

<?php echo $this->headLink();?>

<?php echo $this->headMeta();?>

<?php echo $this->headScript();?>
 
 <!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="core/css/ie8-and-down.css" />
<![endif]-->
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<![endif]-->

 
</head>



<body class="home">

