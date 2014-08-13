common
======

# Intro

A common library for PHP+Javascript.

Class prefixes:
- `_DO` database
- `_SO` session

Function prefixes:
- `___`		debug
- `__*`		hidden
- `_*`		system
- `_str`	string-related
- `_se`		session-related
- `_ml`		multilingual support

# How to use

1. Make __importer.php__ in each project.
2. Import __importer.php__ in major files of the project.

An __importer.php__ sample:

	<?php

	$is_debugging = true;
	set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html/common');

	$__context = array('timezone' => 'America/New_York');
	$__db = array('user' => 'root', 'password' => 'PasswordForRoot');
	$__app = array('name' => basename(dirname($_SERVER['SCRIPT_NAME'])), 'root' => 'chihaoyo');

	include_once('lib-misc.php');
	include_once('lib-db.php');
	include_once('lib-session.php');

	?>