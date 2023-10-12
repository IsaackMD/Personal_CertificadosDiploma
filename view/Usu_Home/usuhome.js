var UsuarioID = $('#usu_idx').val();

$(document).ready(function(){
    console.log(UsuarioID);
    $.post("../../controller/usuario.php?op=total",{UsuarioID:UsuarioID}, function(data) {
        data= JSON.parse(data);
        $('#total').html(data.total_cursos);
    });

});