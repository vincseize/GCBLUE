<?php
	    
	require_once("../__Globals.php");
	require_once("__dbcontroller.php");
	$db_handle = new DBController();


	$sql_table = $_GET['sql_table'] ;


	if(	$sql_table==$TB_TYPES){


	/*	$id = $_REQUEST['id'] ;
		$value = $_REQUEST['value'] ;
		$column = $_REQUEST['columnName'] ;
		$columnPosition = $_REQUEST['columnPosition'] ;
		$columnId = $_REQUEST['columnId'] ;
		$rowId = $_REQUEST['rowId'] ;
	*/


		$name = mysql_real_escape_string(htmlentities($_REQUEST['name'], ENT_QUOTES, "UTF-8"));
		$description = mysql_real_escape_string(htmlentities($_REQUEST['description'], ENT_QUOTES, "UTF-8"));
		$color = $_REQUEST['color'] ;


		// $id = 0;

		/* Add new record and place id of the new record into the $id variable */ 
		// echo $id;


		

/*			$fp = fopen('add.txt', 'w');
			fwrite($fp, $sql_table);
			fwrite($fp, "\n");
			fwrite($fp, $name);
			fwrite($fp, "\n");
			fwrite($fp, $description);
			fwrite($fp, "\n");
			fwrite($fp, $color);
			fclose($fp);*/

				
		// if(isset($name)){ $name = mysql_real_escape_string(htmlentities($name, ENT_QUOTES, "UTF-8")); };
		// if(isset($description)){ $description = mysql_real_escape_string(htmlentities($description, ENT_QUOTES, "UTF-8")); };

		$result = mysql_query("INSERT INTO ".$sql_table." (name, description, color) VALUES ('".$name."','".$description."','".$color."')" );

		echo $_REQUEST['name']; // Important, for not alert !  or id ????

	}




	if(	$sql_table==$TB_PRODUCTS){

		$name 				= mysql_real_escape_string(htmlentities($_REQUEST['name'], ENT_QUOTES, "UTF-8"));
		$localisation_x 	= $_REQUEST['localisation_x'] ;
		$localisation_y 	= $_REQUEST['localisation_y'] ;
		$ville 				= mysql_real_escape_string(htmlentities($_REQUEST['ville'], ENT_QUOTES, "UTF-8"));
		$code_postal 		= mysql_real_escape_string(htmlentities($_REQUEST['code_postal'], ENT_QUOTES, "UTF-8"));
		$adresse 			= mysql_real_escape_string(htmlentities($_REQUEST['adresse'], ENT_QUOTES, "UTF-8"));
		$pays 				= mysql_real_escape_string(htmlentities($_REQUEST['pays'], ENT_QUOTES, "UTF-8"));
		$comments 			= mysql_real_escape_string(htmlentities($_REQUEST['comments'], ENT_QUOTES, "UTF-8"));
		$phone 				= mysql_real_escape_string(htmlentities($_REQUEST['phone'], ENT_QUOTES, "UTF-8"));
		$level 				= mysql_real_escape_string(htmlentities($_REQUEST['phone'], ENT_QUOTES, "UTF-8"));
		$id_type 			= $_REQUEST['type'];		

/*			$fp = fopen('add.txt', 'w');
			fwrite($fp, $sql_table);
			fwrite($fp, "\n");
			fwrite($fp, $nom);
			fwrite($fp, "\n");
			fwrite($fp, $localisation_x);
			fwrite($fp, "\n");
			fwrite($fp, $localisation_y);
			fwrite($fp, "\n");
			fwrite($fp, $comments);
			fwrite($fp, "\n");
			fwrite($fp, $phone);
			fwrite($fp, "\n");
			fwrite($fp, $id_type);

			fclose($fp);*/

		// if(isset($nom)){ $nom = mysql_real_escape_string(htmlentities($nom, ENT_QUOTES, "UTF-8")); };
		// if(isset($comments)){ $comments = mysql_real_escape_string(htmlentities($comments, ENT_QUOTES, "UTF-8")); };

		$result = mysql_query("INSERT INTO ".$sql_table." (name, localisation_x, localisation_y, ville, code_postal, adresse, pays, comments, phone, level, id_type) VALUES ('".$name."','".$localisation_x."','".$localisation_y."','".$ville."','".$code_postal."','".$adresse."','".$pays."','".$comments."','".$phone."','".$level."','".$id_type."')" );

		echo $_REQUEST['name']; // Important, for not alert !  or id ????

	}











?>



