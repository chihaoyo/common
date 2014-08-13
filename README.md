common
======

A common library for php+javascript.

classes:
_DO database
_SO session

prefixes:
___		debug
__*		hidden
_*		system
_str	string-related
_se		session-related
_ml		multilingual support

1. make __importer.php__ in each project
2. import __importer.php__ in major files of the project

__importer.php__ sample:

	<?php

	$is_debugging = true;
	set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/common');

	$__context = array('timezone' => 'America/New_York');
	$__db = array('user' => 'root', 'password' => 'p1aigr0und');
	$__app = array('name' => basename(dirname($_SERVER['SCRIPT_NAME'])), 'root' => 'chihaoyo');

	include_once('lib-misc.php');
	include_once('lib-db.php');
	include_once('lib-session.php');

	?>