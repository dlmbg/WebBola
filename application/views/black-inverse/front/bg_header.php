<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script> 
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/menu.js"></script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=galeri]").fancybox({
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.7				
			});});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>

<title><?php echo $GLOBALS['site_title']; ?></title>
</head>

<body onload="goforit()">
	<div id="logo">
		<div id="left-logo"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/logo.png" /></div>
		<div id="right-logo">
		<div class="cleaner_h10"></div>
		
		</div>
	</div>
<div id="header">
	<div id="top-menu">
		<div id="inner-top-menu">
			<div id="left-inner-top-menu">
				<ul>
					<?php
					$get_atas = $this->db->get_where("dlmbg_menu", array("posisi"=>"atas"));
					foreach($get_atas->result() as $ga)
					{
						echo '<li><a href="'.base_url().'web/pages/'.$ga->id_menu.'">'.$ga->menu.'</a></li>';
					}
					?>
				</ul>
			</div>
			<div id="right-inner-top-menu">
			<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/clock.js" type="text/javascript"></script><span id="clock"></span>
			</div>
		</div>
	</div>
	<div class="cleaner_h0"></div>
	<div id="img-banner"><img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/img-banner.jpg" align="middle" /></div>

</div>

<div id="bottom-menu">
<div id="center-bottom-menu">
  <div class="suckertreemenu">
<ul id="treemenu1">
  	<?php
	$get_bawah = $this->db->get_where("dlmbg_menu", array("posisi"=>"bawah"));
	foreach($get_bawah->result() as $gb)
	{
		echo '<li><a href="'.base_url().'web/pages/'.$gb->id_menu.'">'.$gb->menu.'</a></li>';
	}
	?>
</ul>
</div>
</div>
</div>

<div class="cleaner_h30"></div>
<div class="cleaner_h5"></div>
<div class="cleaner_h1"></div>
<div class="cleaner_h1"></div>
<div class="cleaner_h1"></div>

<div id="bread-crumbs">
	<ul id="crumbs">
		<li><a href="#">Beranda</a></li>
		<li>Selamat Datang di <?php echo $GLOBALS['site_title']; ?></li>
	</ul>
</div>
<div class="cleaner_h10"></div>