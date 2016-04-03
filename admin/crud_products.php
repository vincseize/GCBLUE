<?php

    require_once("../__Globals.php");
    require_once("__dbcontroller.php");

    $this_filename = explode(".",__FILE__)[0];
    $this_container = "container_".explode("_",$this_filename)[1].".php";

    include('__css_js_crud.php'); // don't touch emplacement line 

    //////////////////////////////////////////////// Column name ///////////////////////////////////////////
    // CONFIG your own columns you want to show | default are same as db columns // todo, link with loop otable construct
    // important excatly same name as db
    // $arrayNameCols = array('name','localisation_x','localisation_y','ville','code_postal','adresse','pays','comments','phone','public','horaires','type');  

    //////////////////////////////////////////////// end Colum name ///////////////////////////////////////////

?>


<!-- http://www.laktek.com/2008/10/27/really-simple-color-picker-in-jquery/ 
<script language="javascript" type="text/javascript" src="../js/jquery.colorPicker.js"/></script>-->
<script language="javascript" type="text/javascript" src="../js/owl.js"/></script>
<script language="javascript" type="text/javascript" src="js/crud.js"/></script>
<link rel="stylesheet" href="../css/colorPicker.css" type="text/css" />
<link rel="stylesheet" href="../css/owl.css" type="text/css" />

<script type="text/javascript" charset="utf-8">

	// to unify with types
	function update_type_fromSelectColorList(ListColors,id,tb_sql,columnName){

	    var ObjListe = document.getElementById(ListColors); 
	    var SelIndex = ObjListe.selectedIndex; 
	    var SelValue = encodeURIComponent(ObjListe.options[ObjListe.selectedIndex].value); 
	    var SelText = ObjListe.options[ObjListe.selectedIndex].text; 

	    var color = SelValue;

	    $.post('c_Update.php?sql_table='+tb_sql+'&columnName='+columnName+'&id='+id+'&value='+color+'');
	    $(this).parent().load("<?php echo $this_container; ?>"); 

	}


	function Select_Type(){
	    var ObjListe = document.getElementById("ListTypes"); 
	    var SelIndex = ObjListe.selectedIndex; 
	    var SelValue = encodeURIComponent(ObjListe.options[ObjListe.selectedIndex].value); 
	    var SelText = ObjListe.options[ObjListe.selectedIndex].text; 

	    var id_type = SelValue;

	    var type = document.getElementById("type");
	    type.value = id_type;


		// $(this).parent().load("<?php echo $this_container; ?>"); // todo better refresh
		// onChange css color select to change

	}


	function deleteR_old(id,tb){
		var tr = $('#' + id);  
		tr.css("background-color","#FF3700");

		if (confirm("Are you sure you want to delete this?")) {
			$.post( "c_Delete.php?sql_table="+tb+"&id="+id );
			tr.remove();
		    // console.log(id);
		} else {
		    // tr.removeAttr( 'background-color' );
		    tr.css("background-color","");		    	
		    false;
		}   

		// $(this).parent().load("<?php echo $this_container; ?>");*/

	} 







	$(document).ready( function () {


  	$body = $("body");

  	// loader
      $body.addClass("loading");
  	// end loader
    // $body.removeClass("loading");


  	// default form add type select value
  	// Select_Type();

  	// var id = -1;	//for simulation 
  	var tb = "<?php echo $sql_table; ?>";



  	var oTable = $('#example').dataTable( {

  		retrieve: true,
  	    paging: false,
  	    searching: false

  	} );

  	oTable.fnDestroy();
  	// oTable.fnDraw(false);

    var nEditing = null;





  	$('#addRow').click( function (e) {
  	    e.preventDefault();

  		$body.addClass("loading");

  	    var aiNew = oTable.fnAddData( [ '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click here to modify', '', '', '', '', '', '', '', '', '', '', '', '', '', '' ] ); // &nbsp; for first row
  	    var nRow = oTable.fnGetNodes( aiNew[0] );
  	    // editRow( oTable, nRow );
  	    nEditing = nRow;
  	    
  	    $.post( "c_Add.php?sql_table="+tb ); // todo refresh

  		// oTable.fnDestroy();
  		// oTable.fnDraw();

  		$(this).parent().load("<?php echo $this_container; ?>");

  	} );


/*  	$('#deleteRow_old').click( function (e) {
  	    e.preventDefault();
  		// var aiNew = oTable.row('.selected').remove().draw( false );
  		// var oTT = TableTools.fnGetInstance( 'example' );
      	var aSelectedTrs = fnGetSelected( oTable );
  		alert( aSelectedTrs );

  	} );*/



    // bJQueryUI --> Ui footer etc
    // bFilter: true --> search
    // bInfo ??
		$('#example').dataTable({ bJQueryUI: true,bFilter: true, bInfo: false,bPaginate: true,"sPaginationType": "full_numbers","oAddNewRowButtonOptions": "destroy"}).makeEditable({
		//$('#example').dataTable({ bJQueryUI: true,"sPaginationType": "full_numbers","sDom": '<\"H\"<\"toolbar\">fr>t<"F"ip>',}).makeEditable({


/*


sDom: 'T<"clear">lfrtip',
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save",
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ]
        },*/



							sUpdateURL: "c_Update.php?sql_table="+tb,						
                     		sAddURL: "c_Add.php?sql_table="+tb, // todo rowdata not defined bug non bloquant
/*										success: function(data) {
										                console.log("add done")
										            },*/


                          sAddHttpMethod: "GET",
                          sDeleteHttpMethod: "GET",
                          sDeleteURL: "c_Delete.php?sql_table="+tb,
										
									
            							"aoColumns": [

                              // col 1 id # to be desactived
  /*                            {   
                                cssclass: "required",
                                indicator: 'Saving ...',
                                callback : function(value, settings) {}                               
                              },*/


            									// col 2 nom
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										//tooltip: 'Double Click to edit'
            										callback : function(value, settings) { // to refresh, or what yoy want
												        // console.log(this);
												        // console.log(value);
												        // console.log(settings);												       
												    }
            									},

            									// col 3 loc x
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 4 loc y
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 5 ville
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 6 code postal
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 7 adresse
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}            										
            									},

            									// col 8 pays
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}
            									},

            									// col 9 comments
            									{ 	
                                indicator: 'Saving ...',
                                type: 'textarea',
                                submit:'Save',
                                callback : function(value, settings) {}                                         			
            									},

            									// col 10 phone
            									{ 	
            										cssclass: "required",
            										indicator: 'Saving ...',
            										callback : function(value, settings) {}
            									},

                              // col 11 public
                              {   
                                cssclass: "required",
                                indicator: 'Saving ...',
                                callback : function(value, settings) {}
                              },

                              // col 12 horaires
                              {   
                                cssclass: "required",
                                indicator: 'Saving ...',
                                callback : function(value, settings) {}
                              },

                              // col 13 level
                              {   
                                cssclass: "required",
                                indicator: 'Saving ...',
                                callback : function(value, settings) {}
                              },
            									// col 12 Type type, null for own html content, here type: select
            									null,


            									null,

									

									],



/*"fieldErrors": [
        {
            "name":   "nom",
            "status": "This field is required"
        },
        {
            "name":   "type",
            "status": "This field is required"
        }
    ],*/








							oAddNewRowButtonOptions: {	
											label: "Add...",
											icons: {primary:'ui-icon-plus'} 

							},

/*							oDeleteRowButtonOptions: {	
											label: "Remove", 
											icons: {primary:'ui-icon-trash'}

							},*/
              // oDeleteRowButtonOptions: null,

							oAddNewRowFormOptions: { 	
                                            title: 'Add',
											show: "blind",
											hide: "blind",
											// hide: "explode",
                                            // modal: true
                                            // oTable.fnDraw()
							}	,
							

							sAddDeleteToolbarSelector: ".dataTables_length"	,	




		});
	

// $("#example").fnDestroy().dataTable();
// $("#example").fnDestroy().dataTable();

// console.log("tesst return");

// fnDisableDeleteButton();



  // end loading
  $body.removeClass("loading");




} );






</script>




<body id="index" class="grid_2_3">
		

<div class="modalLoading"><!-- Place at bottom of page --></div>



<style>













.form-container {
   border: 1px solid #f2e3d2;
   background: #c9b7a2;
   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:500px;
   padding:20px;
   width:500px;
   }


.form-field {
   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   padding:8px;
   margin-bottom:10px;
   width:200px;
   }

.form-field:focus {
   background: #fff;
   color: #725129;
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #725129;
   text-shadow: #fdf2e4 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 1px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #31540c;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   }
.submit-button:hover {
   border: 1px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }
.submit-button:active {
   text-shadow: #31540c 0 1px 0;
   border: 1px solid #447314;
   background: #8dc059;
   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
   background: -moz-linear-gradient(top, #6aa436, #8dc059);
   background: -ms-linear-gradient(top, #6aa436, #8dc059);
   background: -o-linear-gradient(top, #6aa436, #8dc059);
   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
   color: #fff;
   }
</style>






	<button class="addRow" id="addRow" name="addRow">+ Add <?php echo $nom_product;?> ...</button>

  <!-- form necessary for add ??? to delete one day -->
  <?php 
                          include('form_to_delete.php');
  ?>

	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		

		<thead>
			<tr>
				<?php
          array_push($arrayNameCols, ''); // '' is for delete last column 
					foreach ($arrayNameCols as $value){
					    echo "<th>".ucfirst ($value)."</th>";
					}
				?>
			</tr>
		</thead>
		<tfoot>
			<tr>

				<?php
					foreach ($arrayNameCols as $value){
					    echo "<th>".ucfirst ($value)."</th>";
					}
				?>
			</tr>

		</tfoot>


		<tbody>


		<?php

		if(!empty($elements)) {
			foreach($elements as $k=>$v) {

				$elements_id           = $elements[$k]["id"];
				$elements_nom 				      = utf8_decode($elements[$k]["name"]); // to do ??? , find a simplification relation with column name array
				$elements_localisation_x 	  = utf8_decode($elements[$k]["localisation_x"]);
				$elements_localisation_y 	  = utf8_decode($elements[$k]["localisation_y"]);				
				$elements_ville             = utf8_decode($elements[$k]["ville"]);
				$elements_code_postal       = utf8_decode($elements[$k]["code_postal"]);	
				$elements_adresse           = utf8_decode($elements[$k]["adresse"]);
				$elements_pays              = utf8_decode($elements[$k]["pays"]);				
				$elements_comments          = utf8_decode($elements[$k]["comments"]);
				$elements_phone             = utf8_decode($elements[$k]["phone"]);	
        $elements_public            = utf8_decode($elements[$k]["public"]);
        $elements_horaires          = utf8_decode($elements[$k]["horaires"]);
        $elements_level          = utf8_decode($elements[$k]["level"]);  
        $elements_id_type           = utf8_decode($elements[$k]["id_type"]);

				echo "<tr id=".$elements_id.">";

        echo "<td width='16%;'>".$elements_nom."</td>";
        echo "<td width='2%;'>".$elements_localisation_x."</td>";
        echo "<td width='2%;'>".$elements_localisation_y."</td>";
        echo "<td>".$elements_ville."</td>";
        echo "<td width='2%;'>".$elements_code_postal."</td>";
        echo "<td>".$elements_adresse."</td>";
        echo "<td width='10%;'>".$elements_pays."</td>";
        echo "<td>".$elements_comments."</td>";
        echo "<td width='7%;'>".$elements_phone."</td>";
        echo "<td>".$elements_public."</td>";
        echo "<td width='7%;'>".$elements_horaires."</td>";
        echo "<td width='2%;'>".$elements_level."</td>";
        echo "<td width='11%;'>";


						echo "<select id='ListTypes_".$elements_id."' onchange=\"update_type_fromSelectColorList('ListTypes_".$elements_id."','".$elements_id."','".$sql_table."','Id_Type');\" style=\"width:100%;height:100%;border:0px;outline:0px\"  >"; 
							// todo owl_types  from globals, and conform with crud types.php
			              	$sql2 = $db_handle->runQuery("SELECT * FROM ".$TB_TYPES."");
			              	if(!empty($sql2)) {
								foreach($sql2 as $kk=>$vv) {
									$type_id 		= utf8_decode($sql2[$kk]["id"]);
									$type_name 		= utf8_decode($sql2[$kk]["name"]);
									$type_color 	= utf8_decode($sql2[$kk]["color"]);
									$selected		= "";
									if($type_id==$elements_id_type){$selected="selected";}
									if($elements_id_type=="0"){$type_name="No Type Selected";} // debug todo better
									echo "<option style=\"background-color:".$type_color.";width:100%;\" value='".$type_id."' $selected>".$type_name."</option>"; 

								}
							}

						echo "</select>"; 


					echo "</td>";
						

					echo "<td><button style='outline: 0;border:0;background:none;color:red;font-weight:bold;'id='deleteR' name='deleteR' onclick=\"deleteR('".$elements_id."','".$sql_table."');\">X</button></td>";
					








				echo "</tr>";

			}
		}


		?>	


		</tbody>


	</table>
				

				
	</body>

</html>