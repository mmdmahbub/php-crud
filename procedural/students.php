<?php
	define('ROOT', dirname(__FILE__));
	define('DS', DIRECTORY_SEPARATOR);
	require_once (ROOT. DS . 'core' . DS .'bootstrap.php');
	$template = new Template;
	$template->template_core('header.php');
	$template->template_core('sidebar.php');
	$template->template_core('top_nav.php');
	$template->parts('students/index.php');
	$template->template_core('copyright.php');
	$template->template_core('footer.php');
