<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///// SESSION OBJECT ///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class _SO {
	private $db = false;
	
	function __construct($db_name = '') { // = 'common') {
		global $__app;
		if($db_name == '')
			$db_name = $__app['name'];
			
		$this->db = connect_to_db($db_name);
	}
	function open() {
		return ($this->db ? true : false);
	}
	function close() {
		$this->db = null;
		return true;
	}
	function read($session_id) {
		$sql = "SELECT data FROM session WHERE session_id = '$session_id'";
		$result = $this->db->qf($sql);
		
		return ($result && count($result) > 0 ? $result['data'] : '');
	}
	function write($session_id, $data) {
		$access_time = time();
		$data = $this->db->e($data);
		$sql = "REPLACE INTO session VALUES ('$session_id', '$access_time', '$data')";
		
		return $this->db->q($sql);
	}
	function destroy($session_id) {
		$sql = "DELETE FROM session WHERE session_id = '$session_id'";
		
		return $this->db->q($sql);
	}
	function clean($max_time) {
		$old = time() - $max_time;
		$sql = "DELETE FROM session WHERE access_time < '$old'";
		
		return $this->db->q($sql);
	}
}

ini_set('session.save_handler', 'user');	// enable user-defined session handlers
ini_set('session.gc_divisor', 10);			// propability to perform gc set to 10%

// set session handlers
$__se = new _SO();
session_set_save_handler(array(&$__se, 'open'), array(&$__se, 'close'), array(&$__se, 'read'), array(&$__se, 'write'), array(&$__se, 'destroy'), array(&$__se, 'clean'));

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///// FUNCTIONS /////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function _se_id() {
	return substr(session_id(), -5); // last 5 "digits" only
}

// get set
function _se_exist($key) {
	return isset($_SESSION[$key]);
}
function _se_get($key) {
/*	if($key == 'lang') {
		if(isset($_GET['lang']))
			return $_GET['lang'];
		else
			return 'zh-tw';
	}
	else {*/
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
//	}
}
function _se_set($key, $value) {
	$_SESSION[$key] = $value;
}
function _se_unset($key) {
	unset($_SESSION[$key]);
}

// queries
function _se_permission() {
	return (_se_exist('permission') ? _se_get('permission') : 'guest');
}
function _se_is_logged_in() {
	return (_se_exist('id') && _se_permission() != 'guest');
}
function _se_is_root() {
	return (_se_is_logged_in() && _se_permission() == 'root');
}

// start session
if(session_id() == '') {
	session_start();
	_se_set('lang', 'zh-tw');
}

___(_se_id());
___(_se_get('lang'));

?>