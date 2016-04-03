<?php
session_start(); 
if (!isset($_SESSION['password'])){
    // echo "false";
    @session_unset(oid);
    @session_destroy(oid);    
    header("location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php

        require_once("../__Globals.php");

    ?>

    <title><?php echo $nom_project; ?></title> 

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="../css/plugins/morris.css" rel="stylesheet">
    -->

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/owl.css" type="text/css" />

    <!-- jquery scripts -->
    <script src="../js/owl.js" type="text/javascript"></script>
    <script src="../js/jquery.min.js"></script>

</head>


<body>

<div class="modalLoading"><!-- Place at bottom of page --></div>

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <?php include('header_navbar.php'); ?>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="font-size:14px;">
                    <li>
                        <a href="#" class="a_menu" onClick="load_div('home_container','../list_products.php');"><i class="fa fa-fw fa-coffee"></i> Liste <?php echo ucfirst($nom_products) ;?></a>
                    </li>
                    <li>
                        <a href="#" class="a_menu" onClick="load_div('home_container','../list_types.php');"><i class="fa fa-fw fa-coffee"></i> Liste <?php echo ucfirst($nom_types) ;?></a>
                    </li>
                    <li>
                        <a href="#" class="a_menu" onClick="load_div('home_container','container_products.php');"><i class="fa fa-fw fa-edit"></i> Gestion <?php echo ucfirst($nom_products) ;?></a>
                    </li>                    
                    <li>
                        <a href="#" class="a_menu" onClick="load_div('home_container','container_types.php');"><i class="fa fa-fw fa-filter"></i> Gestion <?php echo ucfirst($nom_types) ;?></a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>



        <!-- #home_container -->
        <div id="home_container" name="home_container" class="home_container">
            


            <div  id="loader" style="position:absolute;z-index:9999;background-color='red';left: 0px;top: 0px;width: 100%;height: 100%;background: url('../images/loading-animate.gif') 50% 50% no-repeat;display:none;">
            </div>
            <!-- <img src="../images/loading-animate.gif" class="ajax-loader"/> -->



            <?php 

            include("../".$default_adminPage.""); 

            ?>

        </div>
        <!-- /#home_container -->



</div>
<!-- /#wrapper -->




<!-- jQuery -->

<script src="../js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script>


    $(document).ready( function () {



    $body = $("body");

    // loader
    $body.addClass("loading");
    // end loader
    // $body.removeClass("loading");


    $( ".a_menu" ).click(function() {
        $body.addClass("loading");
    })



    // end loading
    $body.removeClass("loading");




} );
</script>
</body>

</html>
