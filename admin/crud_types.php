<?php

    require_once("../__Globals.php");
    require_once("__dbcontroller.php");

    $this_filename = explode(".",__FILE__)[0];
    $this_container = "container_".explode("_",$this_filename)[1].".php";
		
	include('__css_js_crud.php'); // don't touch emplacement

    // CONFIG
	// todo same array as js colorpicker
	$colors_types = array('000000','993300','333300','000080','333399','333333','800000','FF6600','808000','008000','008080','0000FF','666699','808080','FF0000','FF9900','99CC00','339966','33CCCC','3366FF','800080','999999','FF00FF','FFCC00','FFFF00','00FF00','00FFFF','00CCFF','993366','C0C0C0','FF99CC','FFCC99','FFFF99','CCFFFF','99CCFF','FFFFFF');
    //////////////////////////////////////////////// Column name ///////////////////////////////////////////
    // CONFIG your own columns you want to show | default are same as db columns // todo, link with loop otable construct
    // important excatly same name as db    
    // $arrayNameCols = array('name','description','color');

?>


<!-- http://www.laktek.com/2008/10/27/really-simple-color-picker-in-jquery/ -->
<script language="javascript" type="text/javascript" src="../js/jquery.colorPicker.js"/></script>
<script language="javascript" type="text/javascript" src="../js/owl.js"/></script>
<script language="javascript" type="text/javascript" src="js/crud.js"/></script>
<link rel="stylesheet" href="../css/colorPicker.css" type="text/css" />


<script type="text/javascript" charset="utf-8">

	// to unify with products
	function verif_typeColor(ListColors,id,tb_sql,columnName){

	    var ObjListe = document.getElementById(ListColors); 
	    var SelIndex = ObjListe.selectedIndex; 
	    var SelValue = encodeURIComponent(ObjListe.options[ObjListe.selectedIndex].value); 
	    var SelText = ObjListe.options[ObjListe.selectedIndex].text; 

	    // var id = id;
	    // var columnName = "color";
	    var color = SelValue;

	    $.post('c_Update.php?sql_table='+tb_sql+'&columnName='+columnName+'&id='+id+'&value='+color+'');
	    // $( "#home_container" ).load( "container_types.php" ); // todo better refresh
	    $( "#home_container" ).load('<?php echo $this_container; ?>'); // todo better refresh

	    /*
	    if(color!="New_Color"){
	        $.post('c_Update.php?sql_table='+tb+'&columnName='+columnName+'&id='+id+'&value='+color+'');
	        $( "#home_container" ).load( "edit_types.php" );
	    }

	    if(color=="New_Color"){
	        $( "#dialog_newColor" ).dialog(); 
	    }
	    */

	}


	function deleteR_old(id,tb){
		var tr = $('#' + id);  
		tr.css("background-color","#FF3700"); // console.log(id);console.log(tb);

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


		$('#color_new').colorPicker();
		$("#color").val($("#color_new").val());
		//fires an event when the color is changed
		$('#color_new').change(function(){
			$("#color").val($("#color_new").val());
		});

		// var id = -1;	//for simulation 
		// var colors = "{'A':'A','B':'B','#ddaaee':'#ddaaee'}";
		var tb = "<?php echo $sql_table; ?>";


		$('#example').dataTable({ bJQueryUI: true,"sPaginationType": "full_numbers"}).makeEditable({
		// $('#example').dataTable().makeEditable({
							/*sUpdateURL: function(value, settings)
							{
                     							return(value); //Simulation of server-side response using a callback function
							},*/

							sUpdateURL: "c_Update.php?sql_table="+tb,						
                     		sAddURL: "c_Add.php?sql_table="+tb, // todo rowdata not defined bug non bloquant
                     		sAddHttpMethod: "GET",
                            sDeleteHttpMethod: "GET",
							sDeleteURL: "c_Delete.php?sql_table="+tb,
            							"aoColumns": [

            									// col 1 Name
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


            									// col 2 Description
            									{
        									        indicator: 'Saving ...',
													type: 'textarea',
                                         			submit:'Save',
            										callback : function(value, settings) {}
            									},
            									// col 3 Color type, null for own html content, here type: select
                                                null		

									],



							oAddNewRowButtonOptions: {	label: "Add...",
											icons: {primary:'ui-icon-plus'} 
							},

							oDeleteRowButtonOptions: {	label: "Remove", 
											icons: {primary:'ui-icon-trash'}
							},

							oAddNewRowFormOptions: { 	
                                            title: 'Add',
											show: "blind",
											hide: "blind",
											// hide: "explode",
                                            modal: true
							}	,
							

							sAddDeleteToolbarSelector: ".dataTables_length"								

		});
		


	$('#addRow').click( function (e) {
	    e.preventDefault();
	    // console.log('add');
	    $("#formAddNewRow").dialog('open');
	});

	$('#btnAddNewRowOk').click( function (e) {
	    e.preventDefault();
	    // console.log('add');
	    $("#formAddNewRow").dialog('close');


		//code before the pause
		setTimeout(function(){
		    $body.addClass("loading");
		    $( "#home_container" ).load('<?php echo $this_container; ?>'); // todo better refresh
		    $body.removeClass("loading");
		}, 1000);


	});




  // end loading
  $body.removeClass("loading");

} );


</script>




<body id="index" class="grid_2_3">
		

	<div class="modalLoading"><!-- Place at bottom of page --></div>


	<button class="addRow" id="addRow" name="addRow">+ Add <?php echo $nom_type;?> ...</button>

	<!-- Form for add to do hide on load -->

	<!--     todo, better submit refresh -->
	<form id="formAddNewRow" action="#" title="Add" style="width:600px;min-width:600px">
	    
	    <label for="name">Name</label><br />
		<input type="text" name="name" id="name" rel="0" />

	    <br />

	    <label for="description">Description</label><br />
		<input type="text" name="description" id="description" rel="1" />

	    <br />

	    <label for="color">Color</label><br />
	    <input id="color_new" name="color_new" type="text" value="#333399"/>
		<input type="text" name="color" id="color" style="visibility:hidden" rel="2" /> 
		<input placeholder="delete"  class="form-field" type="text" name="delete" id="delete" rel="3" style="visibilityx:hidden"/>


	    <br />

	</form>
	<!-- /Form for add  -->


	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

		<!-- header footer columns  -->
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
		<!-- /header footer columns  -->


		<tbody>

		<?php

		if(!empty($elements)) {
			foreach($elements as $k=>$v) {

				$elements_id = $elements[$k]["id"];

				$elements_nom = utf8_decode($elements[$k]["name"]);
				$elements_description = utf8_decode($elements[$k]["description"]);
				$elements_color = utf8_decode($elements[$k]["color"]);
				$null_txt_color= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; // for width option , todo css option and select

						echo "<tr id=".$elements_id.">";

							echo "<td width='20%;'>".$elements_nom."</td>";
							echo "<td>".$elements_description."</td>";

							echo "<td title='Click to edit' width='5%;' class='center' style='background-color:".$elements_color."' style=\"padding:0;margin:0;\"  >";

								echo "<select id='ListColors_".$elements_id."' style='background-color:".$elements_color.";color:".$elements_color.";' onchange=\"verif_typeColor('ListColors_".$elements_id."','".$elements_id."','".$sql_table."','Color');\" style=\"width:100%;height:100%;border:0px;outline:0px\"  >"; 
									foreach($colors_types as $color_type){
										$color_type = "#".$color_type;
										$selected="";
									   if($color_type==$elements_color){$selected="selected";}
									   echo "<option style=\"background-color:".$color_type.";color:".$color_type.";width:100%;\" value='".$color_type."' $selected>".$null_txt_color."</option>"; 
									}

								echo "</select>"; 

							echo "</td>";

							echo "<td>";
							if($n_types>1){ // security to have a list one type in db
								echo "<button style='outline: 0;border:0;background:none;color:red;font-weight:bold;'id='deleteR' name='deleteR' onclick=\"deleteR('".$elements_id."','".$sql_table."');\">X</button>";
							}
							echo "</td>";
		

						echo "</tr>";

			}
		}


		?>	


		</tbody>


	</table>
				


				
	</body>

</html>