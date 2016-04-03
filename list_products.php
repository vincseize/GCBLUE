<?php

require_once("__Globals.php");
require_once("admin/__dbcontroller.php");
$db_handle = new DBController();
$types = $db_handle->runQuery($GET_ALL_TB_TYPES);
$products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);

?>





<style>






div:empty:before {
  content:attr(data-placeholder);
  color:gray
}


</style>

<script type="text/javascript" charset="utf-8">
	$(document).ready( function () {


  	$body = $("body");

  	// loader
      $body.addClass("loading");

  // end loading
  $body.removeClass("loading");

} );


</script>





		<div id="page-wrapper" style="position:relative;top:0px;height:100%;background-color:white;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- /.row Title-->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Overview <small><?php echo ucfirst($nom_products) ;?> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-coffee"></i> <?php echo ucfirst($nom_products) ;?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row title-->


                <!-- /.row products-->

                <div class="row">



				<?php

					if(!empty($products)) {
						foreach($products as $k=>$v) {


						$id = $products[$k]["id"];

						$product_nom = utf8_decode($products[$k]["name"]);
						$localisation_x = utf8_decode($products[$k]["localisation_x"]);
						$localisation_y = utf8_decode($products[$k]["localisation_y"]);
						$centre_ville = utf8_decode($products[$k]["ville"]);

						$adresse = utf8_decode(nl2br($products[$k]["adresse"]));
						$adresse = str_replace("\\", "", $adresse);
						$adresse = preg_replace("#\\\#","",$adresse);

						$code_postal = utf8_decode($products[$k]["code_postal"]);
						$pays = utf8_decode($products[$k]["pays"]);

						$comments = utf8_decode(nl2br($products[$k]["comments"]));
						$comments = str_replace("\\", "", $comments);
						$comments = preg_replace("#\\\#","",$comments);


						$phone = utf8_decode($products[$k]["phone"]);
						$public = utf8_decode($products[$k]["public"]);
						$horaires = utf8_decode($products[$k]["horaires"]);

						$id_type = utf8_decode($products[$k]["id_type"]);


						// default values
						$type_id = "no id";
						$type = "No Type defined";
						$color_type = "#EDEDED";
						$type_placeholder = "";
						$toggleType_id = "";
						// $View_Details_Type="No Type Selected";

									// todo owl_types  from globals, unify with crud products
					              	$sql2 = $db_handle->runQuery("SELECT * FROM owl_types WHERE id='".$id_type."'");
					              	if(!empty($sql2)) {
										foreach($sql2 as $kk=>$vv) {
											$type_id = utf8_decode($sql2[$kk]["id"]);
											$type = "View Details Type";
											$name_type = utf8_decode($sql2[$kk]["name"]);
											$type_placeholder = "Type [ ".$type_id." ] : ".utf8_decode($sql2[$kk]["name"]);
											$color_type = utf8_decode($sql2[$kk]["color"]);
											$description_type = $name_type."<br><br>".utf8_decode($sql2[$kk]["description"]);
											$toggleType_id = "toggleType_".$id;
										}
									}










		                    echo "<div class='col-lg-3 col-md-6'>";
		                        echo "<div class='panel panel-primary' >";
		                            echo "<div class='panel-heading'>";
		                                echo "<div class='row'>";
		                                    echo "<div class='col-xs-3'>";
		                                        echo "<i class='fa fa-home fa-5x'></i>";
		                                    echo "</div>";
		                                    echo "<div class='col-xs-9 text-right'>";
		                                        echo "<div class='medium' style='font-size:20px;font-weight:bold;'>".$product_nom."</div>";
													echo "<div>".$localisation_x."</div>";		                                        
													echo "<div>".$localisation_y."</div>";		                                        	                                        
													echo "<div>".$pays."</div>";
													echo "<div>".$centre_ville."</div>";
													echo "<div>".$code_postal."</div>";
													echo "<div>".$adresse."</div>";
													echo "<div>".$phone."</div>";
													echo "<div>".$public."</div>";
													echo "<div>".$horaires."</div>";		                                        
		                                    echo "</div>";
		                                echo "</div>";
		                            echo "</div>";
		                            echo "<a href='#'>";
		                                echo "<div class='panel-footer' style='auto;background-color:".$color_type."' onClick=\"toggle_type('".$toggleType_id."')\">";
		                                    // echo "<span class='pull-left'>View Details Type</span>";
		                                    echo "<span class='pull-left'>".$type."</span>";
		                                    echo "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
		                                    echo "<div class='clearfix'></div>";
		                                echo "</div>";
		                            echo "</a>";




											echo "<div id='toggleType_".$id."' class='toggleType_".$id." col-md-6' style='display:none; border:3px dotted ".$color_type.";width:100%;padding-bottom:5px;'>";

												echo "<div style='width:100%;height:auto !important;max-height:150px;overflow-y:auto;'>";	
														echo $description_type;
												echo "</div>";


											echo "</div>";








		                        echo "</div>";




		                    echo "</div>";

						}
					}

				?>








                </div>
                <!-- /.row products-->

                

            </div>
            <!-- /.container-fluid -->
<br><br><br>
        </div>
        <!-- /#page-wrapper -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


















