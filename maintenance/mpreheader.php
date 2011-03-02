<?php
	// TWEET NEST
	// Maintenance area preheader
	
	$web  = !empty($_SERVER['HTTP_HOST']);
	global $web;
	$ds   = preg_quote(DIRECTORY_SEPARATOR, "/");
	$dir  = str_replace(DIRECTORY_SEPARATOR, "/", preg_replace("/" . $ds . "[^" . $ds . "]*$/", "", __FILE__));
	require $dir . "/../inc/preheader.php";
	date_default_timezone_set($config['timezone']);
	$path = rtrim($config['path'], "/");

	if (Ld_Auth::isAuthenticated() && ($site->getAdmin()->getUserRole() == 'admin' || $application->getUserRole() == 'administrator')) {
		// Ok
	} else {
		die("Unauthorized.");
	}

	function l($html){ // Display log line in correct way, depending on HTTP or not
		global $web;
		return $web ? str_replace("</li>\n", "</li>", $html) : strip_tags(str_replace("<li>", "<li> - ", $html));
	}
	
	function ls($html){
		global $web;
		return $web ? s($html) : $html; // Only encode HTML special chars if we're actually in a HTML doc
	}
	
	function good($html){
		return "<strong class=\"good\">" . $html . "</strong>";
	}
	
	function bad($html){
		return "<strong class=\"bad\">" . $html . "</strong>";
	}
	
	function dieout($html){
		echo $html;
		require "mfooter.php";
		die();
	}