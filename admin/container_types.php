<?php require_once("../__Globals.php"); ?>


<div class="container-fluid">

  <!-- Page Heading -->
  <!-- /.row Title-->
  <div class="row">
      <div class="col-lg-12">


      <br><br><br>


          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-filter"></i> Gestion <?php echo ucfirst (NOM_TYPES);?>
              </li>
          </ol>
      </div>
  </div>
  <!-- /.row title-->


<?php include("crud_types.php"); ?>


