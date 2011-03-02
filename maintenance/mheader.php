<?php
	// TWEET NEST
	// Maintenance area header
	
	if($web){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo htmlspecialchars($pageTitle); ?> &#8212; Tweet Nest</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />
	<style type="text/css">
		body { font: small "Helvetica Neue", Helvetica, Arial, sans-serif; margin: 50px; background-color: #eee; color: #666; }
		strong { font-weight: bold; } em { font-style: italic; }
		h1 { color: #000; font-weight: bold; font-size: 250%; } h1 span { color: #444; font-weight: normal; }
		pre, code { font-family: Menlo, "Menlo Regular", Monaco, monospace; }
		pre { border: 1px solid #ccc; background-color: #fff; color: #666; padding: 20px; }
		strong { color: #000; } pre strong { color: #333; } strong.good { color: #3c3; } strong.bad { color: #c00; }
		span.address { color: #999; }
		code { font-size: 95%; background-color: #f7f7f7; color: #666; padding: 0 2px; white-space: nowrap; }
		a img { border-width: 0; }
	</style>
	<?php if (defined('LD_COMPRESS_CSS') && constant('LD_COMPRESS_CSS')) : ?>
	  <link href="<?php echo Ld_Ui::getCssUrl('/h6e-minimal/h6e-minimal.compressed.css', 'h6e-minimal') ?>" rel="stylesheet" type="text/css"/>
	  <link href="<?php echo Ld_Ui::getCssUrl('/ld-ui/ld-ui.compressed.css', 'ld-ui') ?>" rel="stylesheet" type="text/css"/>
	<?php else : ?>
	  <link href="<?php echo Ld_Ui::getCssUrl('/h6e-minimal/h6e-minimal.css', 'h6e-minimal') ?>" rel="stylesheet" type="text/css"/>
	  <link href="<?php echo Ld_Ui::getCssUrl('/ld-ui/ld-ui.css', 'ld-ui') ?>" rel="stylesheet" type="text/css"/>
	<?php endif ?>
	<?php if (defined('LD_APPEARANCE') && constant('LD_APPEARANCE')) : ?>
	  <link href="<?php echo Ld_Ui::getApplicationStyleUrl() ?>" rel="stylesheet" type="text/css"/>
	<?php endif ?>
	<style type="text/css">
	body { padding-top:30px !important; }
	ul.ld-nav { z-index:99; top:35px; }
	.h6e-block { background:white; }
	</style>
	<script type="text/javascript" src="<?php echo Ld_Ui::getJsUrl('/jquery/jquery.js', 'js-jquery') ?>"></script>
</head>
<body class="ld-layout h6e-layout">
	<?php Ld_Ui::topBar() ?>
	<div class="ld-main-content h6e-main-content">
	<h1><span>Tweet Nest:</span> <?php echo htmlspecialchars($pageTitle); ?></h1>
	<div class="h6e-block" style="padding:25px">
	<?php if(!$noPre){ echo "<pre>"; }
	} else {
		header("Content-type: text/plain");
	}