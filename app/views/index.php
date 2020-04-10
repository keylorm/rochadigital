<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!isset($vista))
	$vista = 'inicio';

if (isset($this->session->userdata['logged_in'])) {
	require_once 'header_admin.php';
}else{
	require_once 'header.php';
}






$file = dirname(__FILE__) . '/' . $vista . '.php';

if(file_exists($file))
	require_once $vista . '.php';
else
	echo '<p>Página en construcción  </p>';

require_once 'footer.php';