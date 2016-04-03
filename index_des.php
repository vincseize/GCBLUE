<?php 
    require_once("__Globals.php");
    require_once("admin/__dbcontroller.php");
    $db_handle = new DBController();
    $types = $db_handle->runQuery($GET_ALL_TB_TYPES);
    $products = $db_handle->runQuery($GET_ALL_TB_PRODUCTS);

    include('register.php'); 

    $id_type='All';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <title><?php echo $nom_project; ?></title> 


    <link rel="shortcut icon" href="img/favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Owl CSS -->
    <link rel="stylesheet" type="text/css" href="css/header.css">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<script language="javascript" type="text/javascript" src="js/owl.js"/></script>
<link rel="stylesheet" href="css/owl.css" type="text/css" />



    <style type="text/css">
        html, body {
            height: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
            display: block;
            background-color: #fff;
        }

        .login {
            position:absolute;
            z-index: 9999;
            width:250px;
            border-radius: 0px 0px 0px 20px;
            text-align:center;
            top:90px;  
            right:0px;      
            background-color: #222;
            display: none;
            padding: 0px;
        }

        .filters {
            position:absolute;
            z-index: 9999;

            text-align:center;
            top:40px;  
            right:12px;      
            background-color: #222;
            display: block;
            padding: 0px;
        }

        .logo {
            position: absolute;
            z-index: 10000;
            margin-left: 0px;
            float: left;
            width: 200px;
            height: 75px;
            bottom:10px;
            background: url(img/logo.png) no-repeat center;
            background-position: 0px 0px; 
            display: block;
        }
    </style>


    <script src="js/owl.js" type="text/javascript"></script>

    <scriptSampleDes src="http://maps.google.com/maps/api/js?key=LRDS_GOOGLEMAP_API_KEY" type="text/javascript"></script>

    <script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>

    <script src="js/mapGoogle.js" type="text/javascript"></script>






    <script>
        function searchType(id_type){
            initialize_types(id_type);
        }
    </script>


</head>

<body onload="initialize_types('<?php echo $id_type; ?>');">




    <!-- #logo -->
    <div id="logo" class="logo"></div>
    <!-- /#logo -->

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height:100px;" role="navigation">

            <!-- navbar-header -->
            <?php include('header_navbar.php'); ?>
            <!-- /#navbar-header -->

        </nav>
    </div>
    <!-- /#wrapper -->


    <!-- #home_container -->
    <div id="home_container" name="home_container" class="home_container">

        <!-- #loader
        <div  id="loader" style="position:fixed;z-index:9999;background-color='red';left: 0px;top: 0px;width: 100%;height: 100%;background: url('images/loading-animate.gif') 50% 50% no-repeat;display:none;">
        </div>

         -->
        <!-- #loader -->


        <!-- #googleMap -->
        <script>
        w_canvas_map = getDocWidth();
        h_canvas_map = getDocHeight();
        // alert(h_canvas_map);
        document.write('  <div id="map_canvas" style="width:'+w_canvas_map+'px;height:'+h_canvas_map+'px;padding-top: 180px;margin: 0px;padding: 0px;"></div>');
        </script>
        <!-- /#googleMap -->

    </div>
    <!-- /#home_container -->


    <!-- #login -->
    <div id="login" class="login">
        <form action="register.php" method="post">
            <p>
            <input type="password" name="password" id="password" placeholder="**********" type="password"/>
            <input type="submit" name="submit" id="submit" value="login" />
            </p>
        </form>
    </div>
    <!-- /#login -->


    <!-- #filters -->
    <div id="filters" class="filters">
    <span class="custom-dropdown custom-dropdown--white">
        <select class="custom-dropdown__select custom-dropdown__select--white" onchange="searchType(this.options[this.selectedIndex].value);">
            <option value="All">Show All</option>
            <option disabled>-----------</option>
            <?php 
               
                if(!empty($types)) {
                    foreach($types as $k=>$v) {
                        $selected = "";
                        $id = $types[$k]["id"];
                        $name = utf8_decode($types[$k]["name"]);
                        if($id_type==$id){$selected = "selected";}
                        echo "<option value=".$id." ".$selected.">$name</option>";
                    }
                }
            ?>
        </select>
    </span>
    </div>
    <!-- #filters -->




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <script>
            // initialize(id_type);
    </script>


</body>

</html>
