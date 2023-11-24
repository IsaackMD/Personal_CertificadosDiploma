<div class="br-logo"><a href="../Usu_Home"><span>[</span>Big-Smoke<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Menu</label>
      <div class="br-sideleft-menu">
        <a href="../Usu_Home" class="br-menu-link">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">Inicio</span>
            </div><!-- menu-item -->
          </a><!-- br-menu-link -->
        <?php
          if($_SESSION["Rol_ID"]==1){
              ?>
                <a href="../Usu_Curso" class="br-menu-link">
                  <div class="br-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                    <span class="menu-item-label">Mis Cursos</span>
                  </div><!-- menu-item -->
                </a><!-- br-menu-link -->
              <?php
          }else{
            ?>
            <a href="../AdminMntUsuario/" class="br-menu-link">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Mant. Usuario</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <a href="../AdminMntDetallesCertificado/" class="br-menu-link">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Mant. Cursos</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <a href="../AdminMntInstructor/" class="br-menu-link">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Mant. Instructor</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <a href="../AdminMntCategoria/" class="br-menu-link">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Mant. Categoria</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <a href="../AdminMntCursos/" class="br-menu-link">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Detalle Certificado</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            
            
          <?php
          }

        ?>

      </div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->