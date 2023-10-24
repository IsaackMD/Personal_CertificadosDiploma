var UsuarioID = $('#usu_idx').val();

$(document).ready(function(){
    $.post("../../controller/usuario.php?op=mostrar_Usuario",{UsuarioID:UsuarioID}, function(data) {
        data= JSON.parse(data);
        console.log(data);
        $('#usu_nom').val(data.usu_Nombre);
        $('#usu_apep').val(data.usu_Apellido_P);
        $('#usu_apem').val(data.usu_Apellido_M);
        $('#usu_email').val(data.Correo);
        $('#usu_contr').val(data.Password);
        $('#usu_tel').val(data.Telefono);
        $('#usu_sex').val(data.Sexo);
        // $('#usu_nom').val(data.usu_Nombre);
    });
});


$(document).on("click","#btnactualizar",function(){
    $.post("../../controller/usuario.php?op=update_perfil",{
        UsuarioID:UsuarioID,
        usu_Nombre :$('#usu_nom').val(),
        usu_Apellido_P :$('#usu_apep').val(),
        usu_Apellido_M :$('#usu_apem').val(),
        Password :$('#usu_contr').val(),
        Sexo :$('#usu_sex').val(),
        Telefono :$('#usu_tel').val()

    }, function(data) {
    });
    Swal.fire({
        title: 'Guardado!',
        text: 'Los Cambios han sido Guardados Correctamente',
        icon: 'success',
        confirmButtonText: 'Entendido'
      })
});
