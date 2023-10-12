<?php
  require_once("../../config/conexion.php");
  if(isset($_SESSION["UsuarioID"])){
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
  <?php require_once('../../view/html/MainHead.php') ?>

    <title>Big-Smoke: Perfil</title>
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php require_once('../../view/html/MainMenu.php') ?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <?php require_once('../../view/html/MainHeader.php') ?>
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Perfil</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Perfil</h4>
        <p class="mg-b-0">Estas En La Pantalla de Perfil</p>
      </div>

      <div class="br-pagebody">
        <!-- start you own content here -->

      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php require_once('../../view/html/MainJs.php') ?>
  </body>
</html>

<?php
  }else{
    header("Location:".Conectar::ruta()."index.php");
  }

?>