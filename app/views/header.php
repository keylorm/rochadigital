<!DOCTYPE html>
<html lang="es"><!--manifest="/cache.webcache"-->
<head>
	<meta charset="utf-8">
	<title><?=$titulo?></title>
	<meta name="description" content="<?php if (isset($meta_desc)){print $meta_desc;}?>">
	<meta name="keywords" content="<?php if (isset($meta_keywords)){print $meta_keywords;}?>">
	<meta name="author" content="KMG">	
	<base href="<?=current_url()?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
  	<link href="<?php echo base_url(); ?>pub/css/dropzone.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/colorbox.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/global.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/tablet.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/movil.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/jquery.bxslider.css" rel="stylesheet" />
<script>


  var urlactual = document.URL.replace( /#.*/, "");
	urlactual = urlactual.replace( /\?.*/, "");

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84950721-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body class="<?php echo ' vista-'.$this->general->formatURL($vista); ?>" >
<!--<div class="header-top">
	<div class="w-container">
		<?php require_once 'bloques/menu_login.php'; ?>
	</div>
</div>-->
<div class="header">
	<div class="w-container">
		<div class="w-row">
			<div class="logo w-col w-col-3">
				<a href="/"><img src="/pub/images/logo-min.png" /></a>
			</div>
			<div class="logo w-col w-col-1"><div class="btn btn-naranja btn-movil"><a href="/fotografias/buscar-actividad-codigo">Ingresar código de actividad</a></div></div>
			<div class="menu-main-container w-col w-col-8">
				<?php require_once 'bloques/menu_main.php'; ?>
			</div>


		</div>

	</div>
</div>

<div class="content">