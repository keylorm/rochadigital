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
	<link rel="icon" type="image/png" href="/public/images/favicon.png" />
  	<link href="<?php echo base_url(); ?>pub/css/dropzone.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/colorbox.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/global.css" type="text/css" rel="stylesheet" />
<script>


  var urlactual = document.URL.replace( /#.*/, "");
	urlactual = urlactual.replace( /\?.*/, "");

</script>

</head>
<body class="<?php echo ' vista-'.$this->general->formatURL($vista); ?>" >
<div class="header-top">
	<div class="w-container">
		<?php require_once 'bloques/menu_login.php'; ?>
	</div>
</div>
<div class="header">
	<div class="w-container">
		<div class="logo">
			
		</div>
		<div class="menu-main-container">
			<?php require_once 'bloques/menu_main.php'; ?>
		</div>
	</div>
</div>