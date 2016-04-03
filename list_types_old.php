<?php

require_once("__Globals.php");

require_once("admin/dbcontroller.php");
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








		<div id="page-wrapper" style="position:relative;top:80px;height:100%;background-color:white;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- /.row Title-->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Overview <small>Types</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-coffee"></i> Types
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row title-->


                <!-- /.row types-->

                <div class="row">




                </div>
                <!-- /.row types-->

                

            </div>
            <!-- /.container-fluid -->
<br><br><br>
        </div>
        <!-- /#page-wrapper -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


















