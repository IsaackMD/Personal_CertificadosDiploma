<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Big-Smoke: Consulta</title>

    <?php require_once('../../view/html/MainHead.php') ?>
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h2 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">Consulta!</h1>
        <h6 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">Aqui Podras Consultar Tu DNI.</h5>
        <div class="d-flex justify-content-center">
          <div class="input-group wd-xs-300">
            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI..">
            <div class="input-group-btn">
              <button id="btnConsulta" name="btnConsulta" class="btn btn-info"><i class="fa fa-search"></i></button>
            </div><!-- input-group-btn -->
          </div><!-- input-group -->

          
        </div><!-- d-flex -->
        <div class="row row-sm mg-t-20" id="divpanel">
          <div class="col-12">
            <div class="card pd-0 bd-0 shadow-base">
              <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1" id="lblList">Listado Cursos</h6>
                    <p class="mg-b-0">Aquí visualiza los cursos</p>
                  </div>
                </div><!-- d-flex -->
              </div>
              <div class="pd-x-15 pd-b-15">
                  <div class="table-wrapper">
                    <table id="cursos_data" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">Curso</th>
                          <th class="wd-15p">Fecha Inicio</th>
                          <th class="wd-20p">Fecha Fin</th>
                          <th class="wd-15p">instructor</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
              </div>
            </div><!-- card -->
          </div>
      </div>
      </div>
    </div><!-- ht-100v -->

    


    <?php require_once('../../view/html/MainJs.php') ?>
    <script type="text/javascript" src="consulta.js"></script>
  </body>
</html>
