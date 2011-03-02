<?php

require_once dirname(__FILE__) . '/config.php';

error_reporting(E_ALL ^ E_NOTICE);

$site = Zend_Registry::get('site');

$application = $site->getInstance( dirname(__FILE__) . '/..' );

Zend_Registry::set('application', $application);

$configuration = $application->getConfiguration();

$colors = $application->getColors();

$databases = $site->getDatabases();
$db = $databases[ $application->getDb() ];

$config['twitter_screenname'] = $configuration['twitter_screenname'];

$config['timezone'] = $site->getConfig('timezone', 'UTC');

$config['path'] = $site->getPath() . '/' . $application->getPath();

$config['db'] = array(
    'hostname' => $db['host'],
    'database' => $db['name'],
    'username' => $db['user'],
    'password' => $db['password'],
    'table_prefix' => $application->getDbPrefix()
);

$user = Ld_Auth::getUser();
