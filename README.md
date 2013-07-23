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
include_once('../common/lib-misc.php');
include_once('../common/lib-db.php');

?>

- import __importer.php__ in major files of the project
