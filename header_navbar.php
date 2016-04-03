<!-- navbar-header -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">








        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" onClick="show('logo');"><b><font color='<?php echo $color_header_home; ?>'><?php echo $nom_project; ?></font></b></a>
    </div>
    <!-- Top Menu Items -->











    <ul class="nav navbar-right top-nav">

        <li>
        <a href="index.php" onClick="show('logo');show('filters');"><i class="fa fa-fw fa-bullseye"></i>Map</a>
        </li>
        <li>
        <a href="#" onClick="load_div('home_container','list_products.php');hide('logo');hide('filters');"><i class="fa fa-fw fa-coffee"></i> Liste <?php echo ucfirst($nom_products) ;?></a>
        </li>
        <li>
        <a href="#" onClick="load_div('home_container','list_types.php');hide('logo');"><i class="fa fa-fw fa-filter"></i> Liste <?php echo ucfirst($nom_types) ;?></a>
        </li>
        <li>
        <a href="#" onClick="toggle_type('my_account');hide('logo');hide('login_admin');hide('filters');"><i class="fa fa-fw fa-gear"></i> My Account</a>
        </li>
        <li>
        <a href="#" onClick="toggle_type('login_admin');hide('logo');hide('my_account');hide('filters');"><i class="fa fa-fw fa-gear"></i> Admin</a>
        </li>
        
    </ul>



    </div>
<!-- /#navbar-header -->