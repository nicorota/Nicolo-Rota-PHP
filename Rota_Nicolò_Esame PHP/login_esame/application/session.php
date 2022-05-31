<?php

	session_start();
	
	require_once 'protect.user.php';
	$session = new USER();
	$url =  "{$_SERVER["REQUEST_URI"]}";
	$base_url = config::get('base_url');
	
	if(!$session->is_loggedin())
	{
		$session->redirect($base_url.'/login.php?return='.$url);
	}