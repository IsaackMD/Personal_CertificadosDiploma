var UsuarioID = $('#usu_idx').val();


function init(){
    $("#cursos_form").on("submit",function(e){
        guardaryeditar(e);
    });

    $("#detalle_form").on("submit",function(e){
      guardaryeditarimg(e);
  });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData ($('#cursos_form')[0]);
    $.ajax({
        url:'../../controller/curso.php?op=guardaryeditar',
        type: "POST",
        data: formData,
        contentType: false,
        processData:false,
        success: function(data){
            $('#cursos_data').DataTable().ajax.reload();
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

    $.post("../../controller/categoria.php?op=combo", function(data) {
        $("#CategoriaID").html(data);
        // $('#usu_nom').val(data.usu_Nombre);
    });

    $.post("../../controller/instructor.php?op=combo", function(data) {
        $("#InstructorID").html(data);
        // $('#usu_nom').val(data.usu_Nombre);
    });

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
            url:"../../controller/curso.php?op=listar",
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

function editar(CursoID){
    $.post("../../controller/curso.php?op=mostrar",{CursoID: CursoID}, function(data) {
        data = JSON.parse(data);
        console.log(data);
        $("#CursoID").val(data.CursoID);
        $("#CategoriaID").val(data.CategoriaID);
        $("#Titulo").val(data.Titulo);
        $("#Descripcion").val(data.Descripcion);
        $("#Fecha_Ini").val(data.Fecha_Ini);
        $("#Fecha_Fin").val(data.Fecha_Fin);
        $("#InstructorID").val(data.InstructorID);
    });
    $('#lbltitulo').html('Editar Registros');
    $('#modalmantenimiento').modal('show');
}
function eliminar(CursoID){
    
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
          $.post("../../controller/curso.php?op=eliminar",{CursoID: CursoID}, function(data){
            $('#cursos_data').DataTable().ajax.reload();
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
    $('#lbltitulo').html('Nuevo Registros');
    $('#cursos_form')[0].reset();
    $('#modalmantenimiento').modal('show');
}

function imagen(CursoID){
  $("#CursoxID").val(CursoID);
       
  $('#modalfile').modal('show');
}

function guardaryeditarimg(e){
  e.preventDefault();
  var formData = new FormData ($('#detalle_form')[0]);
  $.ajax({
      url:'../../controller/curso.php?op=update_img_Curso',
      type: "POST",
      data: formData,
      contentType: false,
      processData:false,
      success: function(data){
        $('#detalle_form').DataTable().ajax.reload();
           
          Swal.fire({
            title: 'Guardado!',
            text: 'El Registro Fue Exitoso.',
            icon: 'success',
            confirmButtonText: 'Entendido'
          });
          $('#modalfile').modal('hide');
        }
  });
}

init();

