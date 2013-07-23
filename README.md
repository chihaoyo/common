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

- make __importer.php__ in each project
sample:

<?php

$is_debugging = true;
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/html');

$__db = array('user' => 'user', 'password' => 'password');
$__app = array('name' => basename(dirname($_SERVER['REQUEST_URI'])), 'root' => 'root');

include_once('common/lib-misc.php');
include_once('common/lib-db.php');
include_once('common/lib-session.php');

?>

- import __importer.php__ in major files of the project
