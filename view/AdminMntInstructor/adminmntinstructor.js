var UsuarioID = $('#usu_idx').val();


function init(){
    $("#instructor_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData ($('#instructor_form')[0]);
    $.ajax({
        url:'../../controller/instructor.php?op=guardayeditar',
        type: "POST",
        data: formData,
        contentType: false,
        processData:false,
        success: function(data){
            $('#instructor_data').DataTable().ajax.reload();
            $('#modalmantenimiento').modal('hide');
            Swal.fire({
                title: 'Guardado!',
                text: 'El Registro Fue Exitoso.',
                icon: 'success',
                confirmButtonText: 'Entendido'
              })
        }
    });
}

$(document).ready(function(){


    $('#instructor_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/instructor.php?op=listar",
            type:"post",
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

function editar(InstructorID){
    $.post("../../controller/instructor.php?op=mostrar",{InstructorID: InstructorID}, function(data) {
        data = JSON.parse(data);
        console.log(data);
        $("#InstructorID").val(data.InstructorID);
        $("#ins_Nombre").val(data.ins_Nombre);
        $("#ins_Apellido_P").val(data.ins_Apellido_P);
        $("#ins_Apellido_M").val(data.ins_Apellido_M);
        $("#Correo").val(data.Correo);
        $("#Telefono").val(data.Telefono);
        $("#Sexo").val(data.Sexo);
    });
    $('#lbltitulo').html('Editar Registros');
    $('#modalmantenimiento').modal('show');
}
function eliminar(InstructorID){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-2',
          cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Estas Seguro.?',
        text: "No Será Posible Revertirlo.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: ' Si, Eliminar! ',
        cancelButtonText: ' No, Cancelar! ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Borrado!',
            'El Instructor Ha Sido Eliminado.',
            'success'
          )
          $.post("../../controller/instructor.php?op=eliminar",{InstructorID: InstructorID}, function(data){
            $('#instructor_data').DataTable().ajax.reload();
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'El Instructor Sigue Existiendo :)',
            'error'
          )
        }
      })
}
function nuevo(){
    $('#InstructorID').val('');
    $('#lbltitulo').html('Nuevo Registros');
    $('#instructor_form')[0].reset();
    $('#modalmantenimiento').modal('show');
}

init();

