<?php
	// TWEET NEST
	// HTML Header
	
	header("Content-Type: text/html; charset=utf-8");
	$path = s(rtrim($config['path'], "/"));
	$headTitle = "Tweets by @" . s($config['twitter_screenname']) . ($pageTitle ? " / " . p(s($pageTitle), 3) : "");
	$styleFile = (substr($config['css'], 0, 7) == "http://" || substr($config['css'], 0, 8) == "https://") ? $config['css'] : $path . "/" . ltrim($config['css'], "/");
	unset($config['twitter_password'], $config['db']['password']); // Some sort of security
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $headTitle; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="An archive of all tweets written by <?php echo s(rtrim($author['realname'], ".")); ?>." />
	<meta name="author" content="<?php echo s($author['realname']); ?>" />
	<link rel="stylesheet" href="<?php echo s($styleFile); ?>" type="text/css" />
	<script type="text/javascript" src="<?php echo Ld_Ui::getJsUrl('/jquery/jquery.js', 'js-jquery') ?>"></script>
<?php if($config['anywhere_apikey']){ ?>	<script type="text/javascript" src="http://platform.twitter.com/anywhere.js?id=<?php echo s($config['anywhere_apikey']); ?>&amp;v=1"></script><?php echo "\n"; } ?>
	<script type="text/javascript" src="<?php echo $path; ?>/tweets.js"></script>
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
	</style>
</head>
<body>
	<?php Ld_Ui::topBar() ?>
	<div id="container">
		<div id="top">
			<div id="author">
				<h2><a href="http://twitter.com/<?php echo s($config['twitter_screenname']); ?>"><strong><?php echo s($author['realname']); ?></strong> (@<?php echo s($config['twitter_screenname']); ?>)<img src="<?php echo s($author['profileimage']); ?>" width="48" height="48" alt="" /></a></h2>
				<p><?php echo s($author['location']); ?></p>
			</div>
			<div id="info">
				<p>The below is an off-site archive of <strong><a href="<?php echo $path; ?>/">all tweets posted by @<?php echo s($config['twitter_screenname']); ?></a></strong> ever</p>
<?php if($config['follow_me_button']){ ?>				<p class="follow"><a href="http://twitter.com/<?php echo s($config['twitter_screenname']); ?>">Follow me on Twitter</a></p><?php echo "\n"; } ?>
			</div>
		</div>
		<div id="content">
			<h1><?php echo $pageHeader ? p(s($pageHeader), 3, true) : p(s($pageTitle), 3, true); ?></h1>
			<form id="search" action="<?php echo $path; ?>/search" method="get"><div><input type="text" name="q" value="<?php if($searchQuery){ echo s($searchQuery); } ?>" /></div></form>
<?php if($preBody){ echo "\t\t\t" . $preBody . "\n"; } ?>
			<div id="c"><div id="primary">
