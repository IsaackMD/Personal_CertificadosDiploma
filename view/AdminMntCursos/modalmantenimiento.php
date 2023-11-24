<div id ="modalmantenimiento" class="modal fade" data-backdrop ="static" ata-keyboard ="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Seleccionar Usuarios</h6>
            </div>
                    <div class="modal-body">
                        <input type="hidden" name="UsuarioID" id="UsuarioID">
                        <table id="usuario_data" class="table display responsive nowrap">
                        <thead>
                            <tr>
                            <th class="wd-5p"></th>
                            <th class="wd-20p">Nombre Del Usuario</th>
                            <th class="wd-15p">Correo</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="action" class="btn btn-outline-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="registrar()"> <i class="fa fa-check"></i> Guardar</button>
                        <button type="reset" class="btn btn-outline-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"> <i class="fa fa-close"></i> Cancelar</button>

                    </div>
        </div>
    </div>
</div>
