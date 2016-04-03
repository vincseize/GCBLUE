<?php
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();
	$sql_table = $_GET['sql_table'] ;
	$id = $_REQUEST['id'] ;
	/*	$fp = fopen('delete.txt', 'w');
	fwrite($fp, $id);
	fwrite($fp, "\n");
	fwrite($fp, $sql_table);
	fclose($fp);*/
	$result = mysql_query("DELETE FROM ".$sql_table." WHERE id='".$id."' ");
	echo "delete ok"; // Important, for no alert !  or id ????
	// echo $_REQUEST['id'];

?>



