<?php
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();

	$sql_table = $_GET['sql_table'] ;
	$id = $_REQUEST['id'] ;
	$value = mysql_real_escape_string(htmlentities($_REQUEST['value'], ENT_QUOTES, "UTF-8"));
	$columnName = $_REQUEST['columnName'] ;
	/*$columnPosition = $_REQUEST['columnPosition'] ;
	$columnId = $_REQUEST['columnId'] ;
	$rowId = $_REQUEST['rowId'] ;*/
	
/*	$fp = fopen('add.txt', 'w');
	fwrite($fp, $id);
	fwrite($fp, "\n");
	fwrite($fp, $value);
	fwrite($fp, "\n");
	fwrite($fp, $columnName);
	fclose($fp);*/


	$result = mysql_query("UPDATE ".$sql_table." set ".$columnName." = '".$value."' WHERE  id=".$id);

	echo $_REQUEST['value']; // Important, for not alert !  or id ????
?>



