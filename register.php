<?php
session_start(); 
require_once("__Globals.php");
if (isset($_POST['submit'])){
	if(!empty($_POST['password']) && $_POST['password'] == $password_admin) {
		$_SESSION['password'] = $_POST['password']; 
		header("location: admin/index.php");
	}
	else{
		@session_unset(oid);
		@session_destroy(oid);
		/*header("location: index.php?logged=false&try=again");*/
		header("location: home.php?pwd=OK&log=FALSE");
	}
}

?>