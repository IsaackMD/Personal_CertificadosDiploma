var UsuarioID = $('#usu_idx').val();

function init(){

}
$(document).ready(function(){
    $("#divpanel").hide();
});

$(document).on("click",'#btnConsulta', function() {
    
    var dni = $("#dni").val();
    if(dni.length == 0){
        Swal.fire({
            title: "DNI Vacío",
            text: "Debe ingresar un DNI para buscar",
            icon: "error"
          });
    }else{
        $.post("../../controller/usuario.php?op=consulta_dni",{dni: dni}, function(data) {
            if(data.length>0){
                data=JSON.parse(data);
                $("#lblList").html("Listado de Cursos de : "+data.usu_Nombre+" "+data.usu_Apellido_P+" "+data.usu_Apellido_M);

                $('#cursos_data').DataTable({
                    "aProcessing": true,
                    "aServerSide": true,
                    dom: 'Bfrti',
                    buttons:[
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                    ],
                    "ajax":{
                        url:"../../controller/usuario.php?op=listar_cursos",
                        type:"post",
                        data:{UsuarioID:data.UsuarioID},
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


                $("#divpanel").show();
            }else{
                Swal.fire({
                    title: "DNI No Encontrado",
                    text: "No Existe Usuario",
                    icon: "error"
                  });
            }
        });
    }
    // let lblpng = document.createElement('a');
    // lblpng.download=data.Curso_img;
    // lblpng.href= canvas.toDataURL();
    // lblpng.click();
});

function certificado(CursoDetalleID){
    window.open("../Certificado/index.php?CursoDetalleID="+CursoDetalleID,"_blank");
}

init();


