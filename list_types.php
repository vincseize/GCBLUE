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
                            Overview <small><?php echo ucfirst($nom_types) ;?> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-coffee"></i> <?php echo ucfirst($nom_types) ;?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row title-->


                <!-- /.row products-->

                <div class="row">



				<?php

					if(!empty($types)) {
						foreach($types as $k=>$v) {


						$id = $types[$k]["id"];

						$nom = utf8_decode($types[$k]["name"]);
						$description = utf8_decode($types[$k]["description"]);
						$color = utf8_decode($types[$k]["color"]);
	


						// default values
						$color_type = $color;
						$type_placeholder = "";
						$toggleType_id = "";
						$type = "";
						// $View_Details_Type="No Type Selected";













		                    echo "<div class='col-lg-3 col-md-6'>";
		                        echo "<div class='panel panel-primary' >";
		                            echo "<div class='panel-heading'>";
		                                echo "<div class='row'>";
		                                    echo "<div class='col-xs-3'>";
		                                        echo "<i class='fa fa-home fa-5x'></i>";
		                                    echo "</div>";
		                                    echo "<div class='col-xs-9 text-right'>";
		                                        echo "<div class='medium' style='font-size:20px;font-weight:bold;'>".$nom."</div>";
		                                        echo "<div>".$description."</div>";		                                        
		                                        // echo "<div>".$color."</div>";		                                        	                                        


		                                    echo "</div>";
		                                echo "</div>";
		                            echo "</div>";
		                            // echo "<a href='#'>";
		                                //echo "<div class='panel-footer' style='auto;background-color:".$color_type."' onClick=\"toggle_type('".$toggleType_id."')\">";
		                                echo "<div class='panel-footer' style='auto;background-color:".$color_type."'>";
		                                    // echo "<span class='pull-left'>View Details Type</span>";
		                                    echo "<span class='pull-left'>".$type."</span>";
		                                    // echo "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
		                                    echo "<span class='pull-right'></span>";
		                                    echo "<div class='clearfix'></div>";
		                                echo "</div>";
		                            // echo "</a>";




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


















