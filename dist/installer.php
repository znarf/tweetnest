<?php

class Ld_Installer_Tweetnest extends Ld_Installer
{

	public function postInstall($preferences = array())
	{
		if (isset($preferences['twitter_screenname'])) {
			$this->setConfiguration(array('twitter_screenname' => $preferences['twitter_screenname']));
		}

		$this->createTables();
		$this->upgrade();
		$this->handleFiles();
		$this->handleRewrite();
	}

	public function postUpdate()
	{
		$this->upgrade();
		$this->handleFiles();
		$this->handleRewrite();
	}

	public function createTables()
	{
		$con = $this->getInstance()->getDbConnection('php');
		$dbPrefix = $this->getInstance()->getDbPrefix();
		$schema = Ld_Files::get($this->getAbsolutePath() . '/dist/schema.sql');
		$tables = explode(';', $schema);
		foreach ($tables as $table) {
			$table = str_replace("CREATE TABLE IF NOT EXISTS `tn_", "CREATE TABLE IF NOT EXISTS `$dbPrefix", $table);
			$con->query($table);
		}
	}

	public function upgrade()
	{
		$httpClient = new Zend_Http_Client();
		$httpClient->setConfig(array('timeout' => 10, 'useragent' => 'La Distribution Installer'));
		$httpClient->setCookieJar();
		$httpClient->setUri($this->getInstance()->getAbsoluteUrl() . '/upgrade.php');
		$response = $httpClient->request('GET');

		Ld_Files::rm($this->getInstance()->getAbsolutePath() . '/upgrade.php');
	}

	public function handleFiles()
	{
		$absolutePath = $this->getInstance()->getAbsolutePath();
		Ld_Files::rm($absolutePath . '/setup.php');
		Ld_Files::copy($absolutePath . '/RENAME-ME.htaccess', $absolutePath . '/.htaccess');
		Ld_Files::copy($absolutePath . '/maintenance/RENAME-ME.htaccess', $absolutePath . '/maintenance/.htaccess');
	}

	/* Install Utilities */

	public function handleRewrite()
	{
		if (defined('LD_REWRITE') && constant('LD_REWRITE')) {
			$htaccess  = 'RewriteEngine on' . "\n";
			$htaccess .= 'RewriteRule ^sort/?$ ./sort.php [L]' . "\n";
			$htaccess .= 'RewriteRule ^favorites/?$ ./favorites.php [L]' . "\n";
			$htaccess .= 'RewriteRule ^search/?$ ./search.php [L]' . "\n";
			$htaccess .= 'RewriteRule ^([0-9]+)/([0-9]+)/?$ ./month.php?y=$1&m=$2' . "\n";
			$htaccess .= 'RewriteRule ^sort/?$ ./sort.php [L]' . "\n";
			$htaccess .= 'RewriteRule ^([0-9]+)/([0-9]+)/([0-9]+)/?$ ./day.php?y=$1&m=$2&d=$3' . "\n";
			Ld_Files::put($this->getAbsolutePath() . "/.htaccess", $htaccess);
		}
	}

	/* App Management */

	public function setConfiguration($configuration)
	{
		$configuration = array_merge($this->getConfiguration(), $configuration);
		return parent::setConfiguration($configuration);
	}

}
