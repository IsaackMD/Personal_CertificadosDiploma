<?php
  require_once("../../config/conexion.php");
  if(isset($_SESSION["UsuarioID"])){
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
  <?php require_once('../../view/html/MainHead.php') ?>

    <title>Big-Smoke: MntCursos</title>
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
          <a class="breadcrumb-item" href="#">Cursos</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Cursos</h4>
        <p class="mg-b-0">Mantenimiento</p>
      </div>
    

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        <h4 class="tx-gray-800 mg-b-5">Cursos</h6>
        <p class="mg-b-0">Listadod de Cursos</p>

        <button  class="btn btn-outline-primary m-2" id ="add_button" onclick = "nuevo()" ><i class="fa fa-plus-square"> Nuevo Curso</i></button>
                  <div class="table-wrapper">
                    <table id="cursos_data" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">Categoria</th>
                          <th class="wd-15p">Nombre</th>
                          <th class="wd-15p">Fecha Inicio</th>
                          <th class="wd-15p">Fecha Fin</th>
                          <th class="wd-15p">InstructorID</th>
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

    <script type="text/javascript" src="adminmntcurso.js"></script>
  </body>
</html>

<?php
  }else{
    header("Location:".Conectar::ruta()."index.php");
  }

?>