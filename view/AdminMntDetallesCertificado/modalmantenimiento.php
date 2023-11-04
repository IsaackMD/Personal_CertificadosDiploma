<div id ="modalmantenimiento" class="modal fade" data-backdrop ="static" ata-keyboard ="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
                <form method="post" id="cursos_form">
                <div class="modal-body pd-25">
                    <input type="hidden" name="CursoID" id="CursoID"/>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Categoria: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" name= "CategoriaID" id="CategoriaID" data-placeholder="Seleccione" tabindex="-1" aria-hidden="true">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Titulo" type="text" name="Titulo" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Descripcion" type="text" name="Descripcion" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Fecha Inicio: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Fecha_Ini" type="date" name="Fecha_Ini" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Fecha Fin: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="Fecha_Fin" type="date" name="Fecha_Fin" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Instructor: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" name= "InstructorID" id="InstructorID" data-placeholder="Seleccione" tabindex="-1" aria-hidden="true">
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