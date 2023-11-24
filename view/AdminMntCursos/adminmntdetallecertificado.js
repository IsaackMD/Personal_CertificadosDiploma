var UsuarioID = $('#usu_idx').val();


function init(){

}

$(document).ready(function(){

    $.post("../../controller/curso.php?op=combo", function(data) {
        $("#CursoID").html(data);

    });

    $('#CursoID').change(function (){
        $("#CursoID option:selected").each(function(){
            CursoID = $(this).val();
            console.log(CursoID);

            $('#detalle_data').DataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrti',
                buttons:[
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                ],
                "ajax":{
                    url:"../../controller/curso.php?op=cursoXcurid",
                    type:"post",
                    data: {CursoID,CursoID},
                },
                "bDestroy": true,
                "responsive": true,
                "bInfo": true,
                "iDisplayLength":10,
                "order": [[0,"desc"]],
                "language":{
                    "sProcessing":  "Procesando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se Encontrado Resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                        "oAria": {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente"
                        }
                },
            });
        });
    });




});


function eliminarD(CursoDetalleID){
    console.log(CursoDetalleID);
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-2',
          cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          $.post("../../controller/curso.php?op=eliminarDet",{CursoDetalleID: CursoDetalleID}, function(data){
            $('#detalle_data').DataTable().ajax.reload();
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
}

 function certificado(CursoDetalleID){
    window.open("../Certificado/index.php?CursoDetalleID="+CursoDetalleID,"_blank");
    console.log(CursoDetalleID);
}

function nuevo(){
    if($("#CursoID").val() == ""){
        Swal.fire({
            icon: "error",
            title: "Error!  ",
            text: "Seleccione un Curso.!"
          });
    }else{
        listar_usu($("#CursoID").val());
        $("#modalmantenimiento").modal('show');
    }
  

}

function listar_usu(CursoID){
    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/usuario.php?op=listarus",
            type:"post",
            data: {CursoID,CursoID},
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength":10,
        "order": [[0,"desc"]],
        "language":{
            "sProcessing":  "Procesando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords": "No se Encontrado Resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
                "oAria": {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente"
                }
        },
    });

}

function registrar(){
    table = $('#usuario_data').DataTable();
    var UsuarioID = [];

    table.rows().every(function(rowIdx,tableLoop,rowLoop){
        cell1 = table.cell({row : rowIdx, column: 0}).node();
        if($('input',cell1).prop("checked") == true){
            id= $('input',cell1).val();
            UsuarioID.push([id]);
        }
    });
    console.log(UsuarioID);
    if(UsuarioID == 0){
        Swal.fire({
            icon: "error",
            title: "Error!  ",
            text: "Seleccione al menos un usuario.!"
          });
    }else{
        FormData = new FormData($("#form_detalle")[0]);
        FormData.append('CursoID',CursoID);
        FormData.append('UsuarioID',UsuarioID);
        $.ajax({
            url: '../../controller/curso.php?op=insertDU',
            type: "POST",
            data: FormData,
            contentType: false,
            processData: false,
        });
        $('#detalle_data').DataTable().ajax.reload();
        $('#usuario_data').DataTable().ajax.reload();
        $('#modalmantenimiento').modal('hide');
        Swal.fire({
            icon: "success",
            title: "Registro Exito!  ",
            text: "El Usuario Se Agrego Al Curso Con Exito"
          });
    }
}