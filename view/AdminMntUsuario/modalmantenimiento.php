<div id ="modalmantenimiento" class="modal fade" data-backdrop ="static" ata-keyboard ="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
                <form method="post" id="usuario_form">
                <div class="modal-body pd-25">
                <input type="hidden" name="UsuarioID" id="UsuarioID"/>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_Nombre" type="text" name="usu_Nombre" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_Apellido_P" type="text" name="usu_Apellido_P" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_Apellido_M" type="text" name="usu_Apellido_M" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Correo: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Correo" type="text" name="Correo" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Password" type="text" name="Password" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Telefono" type="text" name="Sexo" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Sexo: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" name= "Telefono" id="Sexo" data-placeholder="Seleccione" tabindex="-1" aria-hidden="true">
                                <option label="Seleccione"></option>
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Rol: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" name= "Rol_ID" id="Rol_ID" data-placeholder="Seleccione" tabindex="-1" aria-hidden="true">
                                <option label="Seleccione"></option>
                                <option value="1">Usuario</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="action" value="add"  class="btn btn-outline-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"> <i class="fa fa-check"></i> Guardar</button>
                        <button type="reset" class="btn btn-outline-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"> <i class="fa fa-close"></i> Cancelar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>