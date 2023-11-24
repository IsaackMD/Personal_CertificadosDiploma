<?php
  require_once("../../config/conexion.php");
  if(isset($_SESSION["UsuarioID"])){
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
  <?php require_once('../../view/html/MainHead.php') ?>

    <title>Big-Smoke: Detalle Certificado</title>
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
          <a class="breadcrumb-item" href="#">Detalle Certificado</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Detalle Certificado</h4>
        <p>Mantenimiento</p>
      </div>

      <div class="br-pagebody">
        
        <div class="br-section-wrapper">
          <h4 class="tx-gray-800 mg-b-5 m-2">Detalle Certificado</h6>
          <p class="mg-b-0 m-2">Listado de Detalle Certificado</p>
            <div class="row mg-b-25 col-12">
              <div class="col-lg-4 py-2">
                <div class="form-group">
                  <select class="form-control select2 select2-hidden-accessible" name="CursoID" id="CursoID" data-placeholder="Seleccione" tabindex="-1" aria-hidden="true">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                  <button  class="btn btn-outline-primary m-2" id ="add_button" onclick = "nuevo()" ><i class="fa fa-plus-square"> Agregar Usuarios</i></button>
              </div>  

                <div class="table-wrapper col-12">
                    <table id="detalle_data" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">Nombre Del Usuario</th>
                          <th class="wd-15p">Curso</th>
                          <th class="wd-15p">Fecha Inicio</th>
                          <th class="wd-15p">Fecha Fin</th>
                          <th class="wd-15p">Nombre Del Instructor</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
              </div>

      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php require_once('../../view/html/MainJs.php') ?>
    <?php require_once('modalmantenimiento.php') ?>

    <script type="text/javascript" src="adminmntdetallecertificado.js"></script>
  </body>
</html>

<?php
  }else{
    header("Location:".Conectar::ruta()."index.php");
  }

?>