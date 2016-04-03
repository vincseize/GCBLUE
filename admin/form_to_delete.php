
	<!-- ADD with form modal -->
	<!-- to do hide on load -->

	<!--  todo, better submit refresh  -->
	<form id="formAddNewRow" action="#" title="Add" style="background: #c9b7a2;display:none;visibility:hidden">
	    
		<input placeholder="Nom" class="form-field" type="text" name="nom" id="nom" rel="0" required/>*

	    <br />

		<input placeholder="Localisation x" class="form-field" type="localisation_x" name="localisation_x" id="description" rel="1" required/>*

	    <br />

		<input placeholder="Localisation y" class="form-field" type="text" name="localisation_y" id="localisation_y" rel="2" required/>*

	    <br />

		<input placeholder="Ville" type="text" class="form-field" name="ville" id="ville" rel="3" />

	    <br />

		<input placeholder="Code Postal" type="text" class="form-field" name="code_postal" id="code_postal" rel="5" />

	    <br />

		<input placeholder="Adresse" type="text" class="form-field" name="adresse" id="adresse" rel="4" />

	    <br />

		<input placeholder="Pays" type="text" class="form-field" name="pays" id="pays" rel="6" />

	    <br />

		<textarea placeholder="Comments"  class="form-field" rows="3" cols="30" name="comments" id="comments" rel="7" ></textarea>

	    <br />

		<input placeholder="Phone"  class="form-field" type="text" name="phone" id="phone" rel="8" />

	    <br />

		<input placeholder="Public"  class="form-field" type="text" name="public" id="public" rel="9" />

		<br />

		<input placeholder="Horaires"  class="form-field" type="text" name="horaires" id="horaires" rel="10" />

	    <br />

		<input placeholder="Phone"  class="form-field" type="text" name="phone" id="phone" rel="11" />

	    <br />

		<input placeholder="Level"  class="form-field" type="text" name="level" id="level" rel="12" />

	    <br />


		<input placeholder="Type"  class="form-field" type="text" name="type" id="type" rel="13" style="visibilityx:hidden"/>
		<label for="ListTypes">Type*</label>

				<?php
										// to do, background color, from unique select from commun to list and option
										echo "<select id='ListTypes' name='ListTypes' onchange=\"Select_Type();\" style=\"width:100%;height:100%;border:0px;outline:0px\">*"; 
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
				?>

		<input placeholder="delete"  class="form-field" type="text" name="delete" id="delete" rel="14" style="visibilityx:hidden"/>



	</form>
	<!-- ADD with form modal -->

