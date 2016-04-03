<?php
 
    require_once("__Globals.php");

	$json = '{ "globals" : [{"GET_ALL_TB_TYPES_URL": "'.$GET_ALL_TB_TYPES_URL.'","CRUD_ACTION_KEY": "'.$CRUD_ACTION_KEY.'","LRDS_GOOGLEMAP_API_KEY": "'.$LRDS_GOOGLEMAP_API_KEY.'","tableid": "'.$tableid.'","center_x": "'.$center_x.'","center_y": "'.$center_y.'","zoom": "'.$zoom.'","map_legend_title": "'.$map_legend_title.'","map_legend_nota_bene": "'.$zoom.'"}]}';

	echo $json;


?>