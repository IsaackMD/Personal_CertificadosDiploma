var UsuarioID = $('#usu_idx').val();


function init(){
    $("#categoria_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData ($('#categoria_form')[0]);
    $.ajax({
        url:'../../controller/categoria.php?op=guardadyeitar',
        type: "POST",
        data: formData,
        contentType: false,
        processData:false,
        success: function(data){
            $('#categoria_data').DataTable().ajax.reload();
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


    $('#categoria_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrti',
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/categoria.php?op=listar",
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

function editar(CategoriaID){
    $.post("../../controller/categoria.php?op=mostrar",{CategoriaID: CategoriaID}, function(data) {
        data = JSON.parse(data);
        console.log(data);
        $("#CategoriaID").val(data.CategoriaID);
        $("#Nombre").val(data.Nombre);
    });
    $('#lbltitulo').html('Editar Registros');
    $('#modalmantenimiento').modal('show');
}
function eliminar(CategoriaID){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
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
          $.post("../../controller/categoria.php?op=eliminar",{CategoriaID: CategoriaID}, function(data){
            $('#categoria_data').DataTable().ajax.reload();
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
function nuevo(){
    $('#CategoriaID').val('');
    $('#lbltitulo').html('Nuevo Registros');
    $('#categoria_form')[0].reset();
    $('#modalmantenimiento').modal('show');
}

init();

