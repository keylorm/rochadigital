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
	<link rel="icon" type="image/png" href="/public/images/favicon.png" /><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link href="<?php echo base_url(); ?>pub/css/colorbox.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/dropzone.css" type="text/css" rel="stylesheet" />
  	<link href="<?php echo base_url(); ?>pub/css/global.css" type="text/css" rel="stylesheet" />
<script>


  var urlactual = document.URL.replace( /#.*/, "");
	urlactual = urlactual.replace( /\?.*/, "");

</script>

</head>
<body class="<?php echo ' vista-'.$this->general->formatURL($vista); ?>" >
<div class="header-top">
	<div class="container">
		<?php require_once 'bloques/menu_admin_user.php'; ?>
	</div>
</div>
<div class="header">
	<div class="container">
		<div class="logo">
			
		</div>
		<div class="main-menu-container">
			<?php require_once 'bloques/menu_admin.php'; ?>
		</div>
	</div>
</div>